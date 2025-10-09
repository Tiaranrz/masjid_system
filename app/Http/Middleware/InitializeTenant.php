<?php

namespace App\Http\Middleware;

use Closure;
use Stancl\Tenancy\Facades\Tenancy;

class InitializeTenant
{
    public function handle($request, Closure $next)
    {
        // Jika sistem pakai subdomain (masjid1.localhost, masjid2.localhost)
        // maka tenancy akan otomatis resolve tenant.
        if (Tenancy::initialized()) {
            return $next($request);
        }

        // Jika sistem pakai login dan tenant disimpan di session
        if (session()->has('tenant_id')) {
            tenancy()->initialize(session('tenant_id'));
        }

        return $next($request);
    }
}
