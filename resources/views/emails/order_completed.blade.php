<!DOCTYPE html>
<html>
<head>
    <title>Order Completed</title>
</head>
<body>
    <h1>Order Completed</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>Thank you for your purchase! Your order has been successfully completed.</p>

    <h2>Order Details</h2>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->recipe->title }} - €{{ $item->price }}</li>
        @endforeach
    </ul>

    <p>Total Price: €{{ $order->total_price }}</p>

    <p>You can download your recipe details as PDFs from the links below:</p>
    {{-- <ul>
        @foreach($pdfPaths as $path)
            <li><a href="{{ route('order.download', ['path' => $path]) }}">Download Recipe PDF</a></li>
        @endforeach
    </ul> --}}
    <ul>
        @foreach($order->items as $item)
            @php
                $pdfPath = 'orders/order_' . $order->id . '_recipe_' . $item->recipe->id . '.pdf';
            @endphp
            <li><a href="{{ route('order.download', ['path' => $pdfPath]) }}">Download {{ $item->recipe->title }} Recipe</a></li>
        @endforeach
    </ul>

    <p>Best regards,<br>The ChefApp Team</p>
</body>
</html>
