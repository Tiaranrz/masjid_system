<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan pengguna sudah login dan role-nya adalah 'superadmin'
        if (Auth::check() && Auth::user()->role === 'superadmin') {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login
        return redirect('/sign-in');
    }
}
