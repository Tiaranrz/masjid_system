<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Masjid;
use App\Models\Role;

class DashboardController extends Controller
{
   public function index()
    {
        return view('superadmin.dashboard', [
            // Menghitung total tenant aktif (pengguna dengan peran 'admin')
            'totalMasjidAktif' => User::where('role', 'admin')->count(),

            // Menghitung total pengguna keseluruhan
            'totalPengguna' => User::count(),

            // Menghitung total admin masjid (sama dengan total tenant)
            'totalAdmin' => User::where('role', 'admin')->count(),

            // Menghitung total jamaah
            'totalJamaah' => User::where('role', 'jamaah')->count(),
        ]);
    }
}
