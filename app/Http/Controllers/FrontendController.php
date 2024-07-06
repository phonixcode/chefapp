<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function recipe()
    {
        return view('user.recipe');
    }
    public function chefs()
    {
        return view('user.chef');
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }
}
