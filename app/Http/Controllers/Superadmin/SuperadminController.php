<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    /**
     * Tampilkan halaman dashboard superadmin.
     * Middleware 'auth' dan 'superadmin' akan memastikan
     * hanya superadmin yang bisa mengakses method ini.
     */
    public function dashboard()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Anda bisa mengambil data lain yang relevan di sini,
        // misalnya statistik keseluruhan, jumlah masjid, dll.

        // Return view dashboard superadmin
        return view('superadmin.dashboard', compact('user'));
    }
    public function rolePermission()
{
    return view('superadmin.dashboard');
}

}
