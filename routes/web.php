<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\SuperadminMiddleware;
use App\Http\Controllers\Superadmin\DashboardController;
use App\Http\Controllers\Superadmin\MasjidController;
use App\Http\Controllers\Superadmin\UserController;

// 🔹 Auth
Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('sign-in');
Route::post('/sign-in', [AuthController::class, 'login']);
Route::get('/sign-up', [AuthController::class, 'showRegistrationForm'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'register']);
Route::get('/recoverpw', [AuthController::class, 'showRecoveryForm'])->name('recoverpw');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Redirect root → login
Route::get('/', function () {
    return redirect()->route('sign-in');
});

// 🔹 Superadmin routes
Route::middleware(['auth', SuperadminMiddleware::class])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CRUD Masjid
       Route::resource('masjid', MasjidController::class);

        // CRUD Users
        Route::resource('users', UserController::class);
        // Rute untuk menampilkan profil pengguna
        Route::get('/superadmin/users/{user}', [UserController::class, 'show'])->name('superadmin.users.show');
        Route::put('/superadmin/users/{user}', [UserController::class, 'update'])->name('superadmin.users.update');

        // Reset Password
        Route::post('users/{id}/reset-password', [UserController::class, 'resetPassword'])
            ->name('users.resetPassword');
    });
