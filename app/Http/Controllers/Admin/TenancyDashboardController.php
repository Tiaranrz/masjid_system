<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenancyDashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard tenancy.
     */
    public function index()
    {
        // Ganti baris ini dengan logic untuk menampilkan view dashboard Anda
        return view('dashboard.tenancy');
    }
}
