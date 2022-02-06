<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role != 'user'){
            // Auth::logout();
            return redirect('/login')->with('error','You are not authorised to complete this action');
        }
        return $next($request);
    }
}
