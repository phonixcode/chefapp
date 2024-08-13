<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Models\WithdrawalDetail;
use App\Http\Controllers\Controller;

class WithdrawalController extends Controller
{
    public function withdrawal()
    {
        $revenues = auth()->user()->revenue;
        $withdrawalDetail = WithdrawalDetail::where('user_id', auth()->id())->first();
        $withdrawals = Withdrawal::where('user_id', auth()->id())->paginate(10);
        return view('admin.withdrawal', compact('withdrawalDetail', 'revenues', 'withdrawals'));
    }

    public function bankInformationSubmit(Request $request)
    {
        $request->validate([
            'bank_information' => 'required|string',
        ]);

        $user = auth()->user();

        // Find the WithdrawalDetail for the authenticated user or create a new one
        $withdrawalDetail = WithdrawalDetail::firstOrNew(
            ['user_id' => $user->id]
        );

        // Update the bank information
        $withdrawalDetail->bank_information = $request->input('bank_information');

        // Save the updated details
        $withdrawalDetail->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bank information updated successfully.');
    }

    public function withdrawRevenue(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $revenues = auth()->user()->revenue;

        $pendingWithdrawals = Withdrawal::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->sum('amount');

        $availableBalance = $revenues - $pendingWithdrawals;

        // Check if the requested amount is less than or equal to the total revenue
        if ($request->input('amount') > $availableBalance) {
            return redirect()->back()->with('error', 'The requested amount exceeds your available revenue.');
        }

        // Create a new withdrawal request
        $withdrawal = Withdrawal::create([
            'user_id' => auth()->id(),
            'amount' => $request->input('amount'),
        ]);

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
    }

    public function withdrawals()
    {
        $withdrawals = Withdrawal::with(['user.withdrawalDetails'])->paginate(10);
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:completed,rejected',
        ]);

        // Retrieve the withdrawal record
        $withdrawal = Withdrawal::findOrFail($id);

        if ($request->input('status') === 'completed') {
            $userId = $withdrawal->user_id;

            $revenueToSubtract = $withdrawal->amount;

            // Subtract the amount from the user's total revenue
            $currentRevenue = Order::forUserRecipes($userId)->where('status', 'completed')->sum('total_price');
            $newRevenue = $currentRevenue - $revenueToSubtract;

            $user = User::findOrFail($userId);
            $user->revenue = $newRevenue; 
            $user->save();
        }

        // Update the withdrawal status
        $withdrawal->status = $request->input('status');
        $withdrawal->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Withdrawal status updated successfully.');
    }


}

