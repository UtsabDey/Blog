<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = RouteServiceProvider::HOME;
    
    public function authenticated()
    {
        if (Auth::user()->role_as == '1') { // 1 = Admin & 0 = User
            return redirect('/admin')->with('success', 'Welcome to Admin Panel');
        } else if (Auth::user()->role_as == '0') {
            return redirect('/home')->with('success', 'Welcome to Laravel BlogSite');
        } else {
            return redirect('/login')->with('warning', 'Please Login First!');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
