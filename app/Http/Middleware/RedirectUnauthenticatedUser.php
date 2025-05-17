<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectUnauthenticatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    //    //Here well store in session the intended url for google callback use
    //     session()->put('intended_url', url()->current());
    //     if (!Auth::user()) {
    //         return redirect()->route('login');
    //     }
        return $next($request);
    }
}
