<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use FileUploadTrait;

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function profileSubmit(Request $request)
    {
        $request->validate([
            'experience' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'restaurant_address' => 'required|string|max:255',
            'restaurant_city' => 'required|string|max:255',
            'restaurant_state' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user = auth()->user();
        $user->experience = $request->experience;
        $user->speciality = $request->speciality;
        $user->restaurant_address = $request->restaurant_address;
        $user->restaurant_city = $request->restaurant_city;
        $user->restaurant_state = $request->restaurant_state;

        // Handle image uploads
        if ($request->hasFile('photo')) {
            // Delete old images
            $this->deleteFile($user->photo);

            // Upload new images
            $imagePath = $this->uploadFile($request->file('photo'), 'profile');
            $user->photo = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated Successfully');
    }
}
