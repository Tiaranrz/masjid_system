<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Pastikan SEMUA middleware di sini dipisahkan dengan koma.
            \App\Http\Middleware\EncryptCookies::class, // <-- KOMPONEN PENTING: Koma ditambahkan di sini
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\TenantMiddleware::class,
        ],

        'api' => [
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\TenantMiddleware::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // Tenancy Middleware Alias
        'tenancy.init' => \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,

        // Auth Middleware
        'auth' => \App\Http\Middleware\AuthMiddleware::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // Custom Middleware
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'tenant' => \App\Http\Middleware\TenantMiddleware::class,
        'init.tenant' => \App\Http\Middleware\InitializeTenant::class,
    ];

    /**
     * The priority of the middleware groups.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Auth\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
