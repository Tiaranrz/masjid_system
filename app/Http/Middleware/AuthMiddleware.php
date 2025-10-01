<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            // Kalau belum login, redirect ke halaman login
            return redirect()->route('sign-in')->withErrors([
                'email' => 'Silakan login terlebih dahulu.',
            ]);
        }

        // Kalau sudah login, lanjutkan request
        return $next($request);
    }
}
