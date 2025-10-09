<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Set tenant_id default jika belum ada
        if (!session()->has('current_tenant_id')) {
            session(['current_tenant_id' => 'masjid1']);
        }

        return $next($request);
    }
}
