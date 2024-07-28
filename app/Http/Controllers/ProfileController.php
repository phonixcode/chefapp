<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile.user_info');
    }

    public function user_info_update(Request $request)
    {
        $user = User::find($request->user()->id);
        $data = $request->all();
        $user->update($data);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    public function user_password_update(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'old-password' => 'required',
            'new-password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*?&]/',  // must contain a special character
            ],
            'confirm_password' => 'required|same:new-password',
        ]);

        // Check if the old password is correct
        if (!Hash::check($request->input('old-password'), Auth::user()->password)) {
            return back()->withErrors(['old-password' => 'The provided password does not match your current password.']);
        }

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return back()->with('status', 'Password successfully updated.');
    }

    public function user_orders()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('items.recipe')->get();

        return view('user.profile.orders', compact('orders'));
    }
}
