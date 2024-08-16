<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TwoFactorCodeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Repository\RegisterRepository;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Password;

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

    // public function loginSubmit(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended(RouteServiceProvider::HOME); // Redirect to intended route or home if not set
    //     }

    //     return redirect()->back()->with('error', 'Incorrect credentials');
    // }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->is_2fa_enabled) {
                // Generate a 2FA code
                $twoFactorCode = rand(100000, 999999);

                // Save the 2FA code to the user's session or database
                $user->two_factor_code = $twoFactorCode;
                $user->two_factor_expires_at = now()->addMinutes(10); // Code expires in 10 minutes
                $user->save();

                // Send the 2FA code to the user's email
                Mail::to($user->email)->send(new TwoFactorCodeMail($twoFactorCode));

                // Log the user out temporarily until they complete 2FA
                Auth::logout();

                // Redirect to the 2FA form
                return redirect()->route('2fa.verify')->with('success', 'We sent you a 2FA code. Please check your email.');
            }

            return redirect()->intended(RouteServiceProvider::HOME); // Redirect to intended route or home if not set
        }

        return redirect()->back()->with('error', 'Incorrect credentials');
    }


    public function register()
    {
        return view('user.auth.register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $data = $request->validated();
        if ($request->get('action') == 'chef') {
            $this->validateChef($request);
            $user = $this->registerRepository->registerChef($data);
        } else {
            $this->validateUser($request);
            $user = $this->registerRepository->registerUser($data);
        }

        return $user
            ? redirect()->route('login')->with('success', 'Registration Successful, Please Login Below')
            : redirect()->back()->with('error', 'Something happened, Please try again later');
    }

    public function forgetPassword()
    {
        return view('user.auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('user.auth.passwords-rest')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
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
            'specialty' => 'required|string',
            'experience' => 'required|integer|min:1',
        ]);
    }


    public function show2faForm()
    {
        return view('user.auth.2fa');
    }

    public function verify2faCode(Request $request)
    {
        $this->validate($request, [
            'two_factor_code' => 'required|numeric',
        ]);

        $user = User::where('two_factor_code', $request->input('two_factor_code'))
            ->where('two_factor_expires_at', '>=', now())
            ->first();

        if ($user) {
            // Clear the 2FA code to prevent reuse
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();

            // Log the user back in
            Auth::login($user);

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect()->back()->with('error', 'Invalid or expired 2FA code.');
    }

}
