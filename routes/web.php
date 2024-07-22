<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
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
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
    Route::get('/chefs', 'chefs')->name('chefs');
});

Route::middleware('auth')->controller(AuthController::class)->group(function () {
    Route::post('logout', 'logout')->name('logout');
});