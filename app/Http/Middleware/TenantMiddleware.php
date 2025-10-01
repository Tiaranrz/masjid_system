<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TenantMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('sign-in');
        }

        $user = Auth::user();

        // Superadmin boleh akses semua tenant
        if ($user->role === 'superadmin') {
            return $next($request);
        }

        // Ambil tenant_id dari session
        $tenantId = session('tenant_id');

        if (!$tenantId || $user->tenant_id !== $tenantId) {
            abort(403, 'Akses ditolak: Anda mencoba mengakses tenant lain.');
        }

        return $next($request);
    }
}
