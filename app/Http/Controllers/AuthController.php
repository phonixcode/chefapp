<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\RegisterRepository;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    protected $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function login()
    {
        return view('user.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(RouteServiceProvider::HOME); // Redirect to intended route or home if not set
        }

        return redirect()->back()->with('error', 'Incorrect credentials');
    }


    public function register()
    {
        return view('user.auth.register');
    }

    public function registerSubmit(Request $request)
    {
        if ($request->get('action') == 'chef') {
            $this->validateChef($request);
            $user = $this->registerRepository->registerChef($request->all());
        } else {
            $this->validateUser($request);
            $user = $this->registerRepository->registerUser($request->all());
        }

        return $user
            ? redirect()->route('login')->with('success', 'Registration Successful, Please Login Below')
            : redirect()->back()->with('error', 'Something happened, Please try again later');
    }

    public function forgetPassword()
    {
        return view('user.auth.forget-password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    private function validateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
    }

    private function validateChef(Request $request)
    {
        $this->validateUser($request);

        $request->validate([
            'restaurant_name' => 'required|string',
            'restaurant_address' => 'required|string',
            'restaurant_city' => 'required|string',
            'restaurant_state' => 'required|string',
            'speciality' => 'required|string',
            'experience' => 'required|integer|min:1',
        ]);
    }
}
