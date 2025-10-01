<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masjid; // Pastikan model Masjid sudah ada

class StatusMasjidController extends Controller
{
    /**
     * Menampilkan daftar status masjid.
     */
    public function index()
    {
        // Ambil semua data masjid dari database
        $masjids = Masjid::all();
        // ATAU dengan paginasi:
        // $masjids = Masjid::paginate(10);

        // Kirim data ke view
        return view('superadmin.status_masjid.index', compact('masjids'));
    }
}
