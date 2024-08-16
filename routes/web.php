<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\RecipeReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WithdrawalController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\ChefVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginSubmit')->name('login.submit');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSubmit')->name('register.submit');
    Route::get('forget-password', 'forgetPassword')->name('forget.password');

    Route::get('forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');

    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');

    Route::get('/2fa-verify', 'show2faForm')->name('2fa.verify');
    Route::post('/2fa-verify', 'verify2faCode')->name('2fa.verify.submit');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/recipes', 'recipe')->name('recipes');
    Route::get('/recipes/{slug}', 'recipeDetails')->name('recipes.details');
    Route::post('/recipe-filter', 'recipeFilter')->name('recipes.filter');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/send-contact-email', 'sendEmail')->name('contact.send');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout')->middleware('auth');
    Route::get('/wishlist', 'wishlist')->name('wishlist')->middleware('auth');
    Route::post('/wishlist', 'storeWishlist')->name('wishlist.store')->middleware('auth');
    Route::delete('/wishlist/remove', 'removeWishList')->name('wishlist.remove')->middleware('auth');
    Route::get('/chefs', 'chefs')->name('chefs');
    Route::get('/chefs/{id}', 'chefDetails')->name('chefs.details');
});

Route::post('/reviews', [RecipeReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{recipe}', [RecipeReviewController::class, 'list'])->name('reviews.list');
Route::get('recipes/{id}/reviews/count', [RecipeReviewController::class, 'count'])->name('reviews.count');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');


Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(OrderController::class)->group(function () {
        Route::post('/checkout', 'checkout')->name('checkout');
        Route::get('/paypal/success/{orderId}', 'success')->name('paypal.success');
        Route::get('/paypal/cancel', 'cancel')->name('paypal.cancel');
        Route::get('/order-success', 'successPage')->name('order.success');
        Route::get('/order-cancel', 'cancelPage')->name('order.cancel');
        Route::get('orders/download', 'download')->name('order.download');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/user-profile', 'profile')->name('user.profile');
        Route::post('/user-profile-update', 'user_info_update')->name('user.profile.update');
        Route::post('/user-password', 'user_password_update')->name('user.password.update');
        Route::get('/user-orders', 'user_orders')->name('user.orders');
        Route::post('/update-2fa', 'update2fa')->name('update.2fa');
    });

    Route::middleware(['check.role'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
            Route::get('orders', 'orders')->name('orders');
            Route::get('orders/{id}', 'order_detail')->name('orders.detail');
            Route::get('profile', 'profile')->name('profile');
            Route::post('profile', 'profileSubmit')->name('profile.submit');
            Route::post('booking-info', 'bookingInfo')->name('booking.submit');
            Route::post('submit-certificate', 'submitCertificate')->name('submitCertificate');
        });

        Route::controller(WithdrawalController::class)->group(function () {
            Route::get('withdrawal', 'withdrawal')->name('withdrawal');
            Route::post('withdrawal/bank-information', 'bankInformationSubmit')->name('withdrawal.bank.information.submit');
            Route::post('withdrawal/withdraw-revenue', 'withdrawRevenue')->name('withdrawal.revenue.submit');

            Route::get('withdrawals', 'withdrawals')->name('withdrawals')->middleware('check.admin');
            Route::put('withdrawals/{id}/status', 'updateStatus')->name('withdrawals.updateStatus')->middleware('check.admin');
        });

        Route::resource('recipe-categories', CategoryController::class);
        Route::resource('recipe-items', RecipeController::class);
        Route::resource('blog-items', BlogController::class);
        Route::resource('chef-verifications', ChefVerificationController::class)->middleware('check.admin');
        Route::resource('users', UserController::class)->middleware('check.admin');
    });
});