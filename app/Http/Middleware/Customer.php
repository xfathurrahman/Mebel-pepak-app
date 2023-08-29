<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 0){
            return $next($request);
        }
        return redirect('/');
    }
}
