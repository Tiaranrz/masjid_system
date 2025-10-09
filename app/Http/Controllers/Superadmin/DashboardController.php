<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Masjid; // Pastikan model ini sudah di-import
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index()
    {
        // 1. Variabel yang Hilang: Hitung Total Masjid
        // Asumsi "Total Masjid Aktif" di dashboard Anda merujuk pada total masjid yang ada.
        $totalMasjid = Masjid::count();

        // 2. Kirim Data ke View
        return view('superadmin.dashboard', [
            // Variabel ini yang dicari di dashboard.blade.php
            // Sekarang diisi dengan hitungan dari tabel Masjid.
            'totalMasjidAktif' => $totalMasjid,

            // Hitungan total pengguna keseluruhan
            'totalPengguna' => User::count(),

            // Menghitung total admin masjid
            // Catatan: Jika total admin masjid == total tenant, Anda bisa hitung salah satunya saja.
            'totalAdmin' => User::where('role', 'admin')->count(),

            // Menghitung total jamaah
            'totalJamaah' => User::where('role', 'jamaah')->count(),
        ]);
    }

    /**
     * Endpoint API untuk mengambil data statistik (JSON).
     */
    public function getStatistikMasjid(Request $request)
    {
        try {
            $totalMasjid = Masjid::count();
            $totalPengguna = User::count();
            $totalAdminMasjid = User::where('role', 'admin')->count();
            $totalJamaah = User::where('role', 'jamaah')->count();

            return response()->json([
                'status' => 'success',
                'statistik' => [
                    'total_masjid' => $totalMasjid,
                    'total_pengguna' => $totalPengguna,
                    'total_admin' => $totalAdminMasjid,
                    'total_jamaah' => $totalJamaah,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengambil data statistik: ' . $e->getMessage()
            ], 500);
        }
    }
}
