<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve cart from the request
        $cart = $request->input('cart', []);

        if (empty($cart)) {
            return response()->json(['status' => 'error', 'message' => 'Your cart is empty.'], 400);
        }

        // Calculate the total price and round to two decimal places
        $totalPrice = round(array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0), 2);

        // Create a new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        // Create order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'recipe_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // PayPal payment setup
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $orderData = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => number_format($totalPrice, 2, '.', ''),
                    ],
                ],
            ],
            "application_context" => [
                "cancel_url" => route('paypal.cancel'),
                "return_url" => route('paypal.success', $order->id),
            ],
        ];

        $response = $provider->createOrder($orderData);

        if (isset($response['id']) && $response['id'] != null) {
            // Return the PayPal approval link
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return response()->json(['status' => 'success', 'redirect_url' => $link['href']]);
                }
            }

            return response()->json(['status' => 'error', 'message' => 'Something went wrong.'], 500);
        } else {
            return response()->json(['status' => 'error', 'message' => $response['message'] ?? 'Something went wrong.'], 500);
        }
    }

    public function success(Request $request, $orderId)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = Order::find($orderId);
            $order->update([
                'status' => 'completed',
                'payment_status' => 'paid',
            ]);

            // Get the order items
            $orderItems = $order->items;
            $pdfPaths = [];

            foreach ($orderItems as $item) {
                $recipe = $item->recipe;
                $pdf = PDF::loadView('pdf.recipe', ['order' => $order, 'recipe' => $recipe]);
                $pdfPath = 'orders/order_' . $orderId . '_recipe_' . $recipe->id . '.pdf';
                Storage::put($pdfPath, $pdf->output());
                $pdfPaths[] = [
                    'path' => $pdfPath,
                    'title' => $recipe->title
                ];
            }

            // Send the email with the PDF paths
            Mail::to($order->user->email)->send(new OrderCompleted($order, $pdfPaths));

            return redirect()->route('order.success')->with('success', 'Order has been completed.');
        } else {
            return redirect()->route('order.cancel')->with('error', $response['message'] ?? 'Payment failed.');
        }
    }


    public function cancel()
    {
        return redirect()->route('cart')->with('error', 'You have canceled the transaction.');
    }

    public function successPage()
    {
        return view('user.order.success');
    }

    public function cancelPage()
    {
        return view('user.order.cancel');
    }

    public function download(Request $request)
    {
        $path = $request->input('path');
    
        if (Storage::exists($path)) {
            return response()->download(storage_path('app/' . $path));
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
