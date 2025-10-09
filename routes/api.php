<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\DashboardController; // Pastikan ini di-import

// ... rute-rute lainnya

Route::prefix('superadmin')->group(function () {
    // Ini adalah endpoint API baru Anda
    Route::get('statistik-masjid', [DashboardController::class, 'getStatistikMasjid']);
});
