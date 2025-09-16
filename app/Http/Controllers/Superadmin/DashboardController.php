<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\User;
use App\Models\Superadmin\Masjid;
use App\Models\Superadmin\Role;

class DashboardController extends Controller
{
    public function index()
    {
        return view('superadmin.dashboard', [
            'totalMasjid'     => Masjid::count(),
            'totalSuperadmin' => User::where('role', 'superadmin')->count(),
            'totalAdmin'      => User::where('role', 'admin')->count(),
            'totalJamaah'     => User::where('role', 'jamaah')->count(),
        ]);
    }
}
