<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

//----------- Controllers -----------//
use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\Superadmin\MasjidController; // ← PERBAIKI: "MasjidController" bukan "MasjidsController"
use App\Http\Controllers\Superadmin\StatusMasjidController;
use App\Http\Controllers\Superadmin\UserManagementController;
use App\Http\Controllers\Superadmin\PermissionController;
use App\Http\Controllers\TenantController; // ← TAMBAHKAN INI

//---------- Controllers Admin --------//
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MasjidController as AdminMasjidController; // ← PERBAIKI: rename karena bentrok
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\JamaahController;
use App\Http\Controllers\Admin\LaporanController;

//---------- Controller Jamaah --------//
use App\Http\Controllers\Jamaah\DashboardController as JamaahDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Rute Otentikasi Umum
Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/sign-in', [AuthController::class, 'login']);
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/sign-up', [AuthController::class, 'showRegistrationForm'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'register']);
Route::get('/recoverpw', [AuthController::class, 'showRecoveryForm'])->name('recoverpw');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// -------------------- Rute untuk Superadmin --------------------
Route::prefix('superadmin')->name('superadmin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SuperadminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Masjid
    Route::get('/masjid', [MasjidController::class, 'index'])->name('masjid.index');
    Route::get('/masjid/create', [MasjidController::class, 'create'])->name('masjid.create');
    Route::post('/masjid', [MasjidController::class, 'store'])->name('masjid.store');
    Route::get('/masjid/{id}/edit', [MasjidController::class, 'edit'])->name('masjid.edit');
    Route::put('/masjid/{id}', [MasjidController::class, 'update'])->name('masjid.update');
    Route::delete('/masjid/{id}', [MasjidController::class, 'destroy'])->name('masjid.destroy');

    // CRUD User
    Route::resource('users', UserManagementController::class);

    // Status Masjid
    Route::get('/status_masjid', [StatusMasjidController::class, 'index'])->name('status_masjid.index');

    // Rute Role & Permission
    Route::get('/roles_permission', [PermissionController::class, 'index'])->name('roles.index');
}); // ← PENUTUP GRUP SUPERADMIN YANG BENAR

// Route untuk switch tenant (DI LUAR GRUP, agar bisa diakses semua role)
Route::get('/switch-tenant/{tenantId}', [TenantController::class, 'switch'])->name('tenant.switch');

// -------------------- Rute untuk Admin Masjid --------------------
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // 1. DASHBOARD & KALENDER
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/calender', [AdminDashboardController::class, 'calender'])->name('calender');

    // Manajemen Profil Masjid & lainnya
    Route::resource('masjid', AdminMasjidController::class); // ← GUNAKAN AdminMasjidController
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('events', EventController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('jamaah', JamaahController::class);
    Route::resource('laporan', LaporanController::class);
}); // ← PENUTUP GRUP ADMIN

// -------------------- Rute untuk Jamaah --------------------
Route::prefix('jamaah')->name('jamaah.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [JamaahDashboardController::class, 'index'])->name('dashboard');
}); // ← PENUTUP GRUP JAMAAH
