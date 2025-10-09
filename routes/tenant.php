<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Admin\TenancyDashboardController;

/*
|--------------------------------------------------------------------------
| Tenant Routes (Masjid)
|--------------------------------------------------------------------------
| Rute ini khusus untuk domain masing-masing masjid.
| Akan dijalankan ketika tenancy aktif berdasarkan domain masjid.
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,       // Tanpa string literal, langsung refer ke kelasnya
    PreventAccessFromCentralDomains::class, // Mencegah akses dari domain utama
])->group(function () {

    // --- Admin Masjid (login dibutuhkan) ---
    Route::middleware(['auth', 'tenant'])->group(function () {

        Route::get('/dashboard', [TenancyDashboardController::class, 'index'])
            ->name('tenant.dashboard'); // ✅ Ganti agar tidak bentrok dengan admin pusat

        // Contoh route lain:
        // Route::resource('keuangan', \App\Http\Controllers\Admin\KeuanganController::class);
    });

    // --- Akses Publik Jamaah ---
    // Route::get('/', [\App\Http\Controllers\Jamaah\HomeController::class, 'index'])->name('jamaah.home');
    // Route::get('/jadwal-shalat', [JadwalController::class, 'index'])->name('jamaah.jadwal');
});
