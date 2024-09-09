<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        Auth::logout();  // Log out the user
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the session token

        return redirect('/login')->with('status', 'You have been logged out successfully!');  
    }

    public function login(Request $request)
     { 
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|string',
         ]);
 
         $credentials = $request->only('email', 'password');
         $remember = $request->has('remember');
 
         if (Auth::attempt($credentials, $remember)) {
             // The user is being remembered
             return redirect()->intended($this->redirectTo);
         }
 
         // Jika gagal, redirect kembali ke form login dengan error
         return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
     }
}
