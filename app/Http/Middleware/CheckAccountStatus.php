<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccountStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_active == false) {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Votre compte est désactivé. Veuillez contacter l\'administrateur']);
        }
        return $next($request);
    }
}
