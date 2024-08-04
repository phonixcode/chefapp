<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/recipes', 'recipe')->name('recipes');
    Route::get('/recipes/{slug}', 'recipeDetails')->name('recipes.details');
    Route::post('/recipe-filter', 'recipeFilter')->name('recipes.filter');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout')->middleware('auth');
    Route::get('/wishlist', 'wishlist')->name('wishlist')->middleware('auth');
    Route::post('/wishlist', 'storeWishlist')->name('wishlist.store')->middleware('auth');
    Route::delete('/wishlist/remove', 'removeWishList')->name('wishlist.remove')->middleware('auth');
    Route::get('/chefs', 'chefs')->name('chefs');
});

Route::middleware('auth')->group(function () {
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');

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
    });

    Route::middleware(['check.role'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
        });

        Route::resource('recipe-categories', CategoryController::class);
        Route::resource('recipe-items', RecipeController::class);

    });
});