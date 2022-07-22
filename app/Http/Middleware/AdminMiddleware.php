<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == '1') { // 1 = Admin & 0 = User
                return $next($request);
            } else {
                return redirect('home')->with('status', 'Access Denied! As you are not Admin');
            }
        }
        else{
            return redirect('login');
        }

    }
}
