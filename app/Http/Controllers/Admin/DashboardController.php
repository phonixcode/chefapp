<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Order;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class DashboardController extends Controller
{
    use FileUploadTrait;

    public function dashboard()
    {
        $userId = auth()->id();
        $orders = Order::forUserRecipes($userId)->count();
        $recipes = Recipe::where('user_id', $userId)->count();
        $blogs = Blog::where('user_id', $userId)->count();
        // $revenues = Order::forUserRecipes($userId)->where('status', 'completed')->sum('total_price');
        $revenues = auth()->user()->revenue;

        return view('admin.dashboard', compact('orders', 'recipes', 'blogs', 'revenues'));
    }

    public function profile()
    {
        $booking = Booking::where('user_id', auth()->id())->first();
        return view('admin.profile', compact('booking'));
    }

    public function profileSubmit(Request $request)
    {
        $request->validate([
            'experience' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'restaurant_address' => 'required|string|max:255',
            'restaurant_city' => 'required|string|max:255',
            'restaurant_state' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $user->experience = $request->experience;
        $user->specialty = $request->specialty;
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

    public function bookingInfo(Request $request)
    {
        $request->validate([
            'calendar_link' => 'required|string',
        ]);

        $user = auth()->user();

        $booking = Booking::firstOrNew(
            ['user_id' => $user->id]
        );

        $booking->calendar_link = $request->input('calendar_link');
        $booking->save();

        return redirect()->back()->with('success', 'Calendar Info updated successfully.');
    }

    public function orders()
    {
        $orders = Order::forUserRecipes(auth()->id())
            ->with(['user', 'items.recipe'])
            ->paginate(10);

        return view('admin.order.index', compact('orders'));
    }


    public function order_detail($id)
    {
        $order = Order::with(['user', 'items.recipe'])->findOrFail($id);

        return view('admin.order.show', compact('order'));
    }
}
