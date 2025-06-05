<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OtpVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('otp_verified') || session('otp_verified') !== true) {
            return redirect('/')->with('middleWare', 'Access denied. Please login first.');
        }

        return $next($request);
    }
}
