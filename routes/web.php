<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
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
    Route::get('/wishlist', 'wishlist')->name('wishlist');
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
});