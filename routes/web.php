<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//----------- Controllers -----------//
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\Superadmin\MasjidsController;
use App\Http\Controllers\Superadmin\StatusMasjidController;
use App\Http\Controllers\Superadmin\UserController as SuperadminUserController;
use App\Http\Controllers\Superadmin\PermissionController;
//---------- Controllers Admin --------//
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MasjidController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\JamaahController;
use App\Http\Controllers\Admin\LaporanController;
//---------- Controller Jamaah --------//
use App\Http\Controllers\Jamaah\DashboardController as JamaahDashboardController;
// use App\Models\Superadmin\Permission; // Hapus jika tidak digunakan
// use App\Http\Middleware\RoleMiddleware; // Hapus jika tidak digunakan

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
    Route::resource('users', SuperadminUserController::class);
    Route::resource('masjid', MasjidsController::class);
    Route::get('/status_masjid', [StatusMasjidController::class, 'index'])->name('status_masjid.index');

    // Rute Role & Permission
    Route::resource('roles', PermissionController::class)->names('roles');
    Route::get('/roles_permission', [PermissionController::class, 'index'])->name('roles.index');
});

// -------------------- Rute untuk Admin Masjid --------------------
// Semua rute ini mendapat prefix 'admin.' dan middleware 'auth' & 'role:admin'
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // 1. DASHBOARD & KALENDER
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/calender', [AdminDashboardController::class, 'calender'])->name('calender');

    // 2. MANAJEMEN INFORMASI MASJID
    // Gunakan resource tanpa names() karena prefix parent sudah memberikan nama 'admin.'
    Route::resource('masjid', MasjidController::class);
    // Rute tunggal untuk menampilkan/update profil masjid
    // Rute untuk menampilkan daftar/profil masjid
    Route::get('/admin/masjid', [MasjidController::class, 'index'])->name('admin.masjid.index');



    // 3. MANAJEMEN KEUANGAN
    Route::prefix('keuangan')->group(function () {
        // Rute Index Utama: /admin/keuangan (Name: admin.keuangan.index)
        Route::get('/', [KeuanganController::class, 'index'])->name('keuangan.index');

        // Rute Detail: /admin/keuangan/donasi (Name: admin.keuangan.donasi)
        Route::get('/donasi', [KeuanganController::class, 'donasi'])->name('keuangan.donasi');

        // Rute Detail: /admin/keuangan/ziswaf (Name: admin.keuangan.ziswaf)
        Route::get('/ziswaf', [KeuanganController::class, 'ziswaf'])->name('keuangan.ziswaf');

        // Rute CRUD untuk transaksi (kecuali index, karena index sudah didefinisikan di atas)
        Route::resource('/', KeuanganController::class)->names('keuangan')->except(['index']);
    });

    // 4. JADWAL EVENT (Menggunakan resource, nama rute: admin.event.index, admin.event.create, dst.)
    Route::resource('event', EventController::class);

    // 5. MANAJEMEN INVENTORY
    Route::resource('inventory', InventoryController::class);

    // 6. MANAJEMEN JAMAAH
    Route::resource('jamaah', JamaahController::class);

    // 7. LAPORAN
    Route::resource('laporan', LaporanController::class)->only(['index']);

    // Rute Khusus Laporan Detail (Tersarang di dalam prefix 'laporan')
    Route::prefix('laporan')->group(function () {
        Route::get('/keuangan', [LaporanController::class, 'keuangan'])->name('laporan.keuangan');
        Route::get('/kegiatan', [LaporanController::class, 'kegiatan'])->name('laporan.kegiatan');
        Route::get('/inventory', [LaporanController::class, 'inventory'])->name('laporan.inventory');
    });
});
// <--- PENUTUP GRUP ADMIN MASJID DI SINI

// -------------------- Rute untuk Jamaah --------------------
Route::prefix('jamaah')->name('jamaah.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [JamaahDashboardController::class, 'index'])->name('dashboard');
});
