<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Masjid; // Asumsikan ini sudah benar

class MasjidController extends Controller
{
    /**
     * Menampilkan halaman index (Manajemen Informasi Masjid) untuk editing profil.
     */
    public function index()
    {
        // 1. Dapatkan ID Masjid yang terkait dengan admin yang login
        // Kolom di Model User: id_masjid
        $masjidId = Auth::user()->id_masjid;

        if (!$masjidId) {
            // PERBAIKAN: Redirect ke rute yang aman untuk mencegah loop
            // Ganti 'admin.dashboard.index' dengan rute dashboard Anda yang sebenarnya
            return redirect()->route('admin.dashboard')->with('error', 'Akun Anda tidak terhubung dengan data masjid manapun. Harap hubungi Superadmin.');
        }

        // 2. Ambil data masjid berdasarkan ID
        $masjid = Masjid::findOrFail($masjidId);

        // 3. Tampilkan view
        // PERBAIKAN: Mengirim variabel $masjid ke view
        return view('admin.masjid.index', compact('masjid'));
    }

    // ... (Metode show() dan lainnya tetap sama)

    /**
     * Memperbarui informasi profil masjid.
     */
    public function update(Request $request, $id)
    {
        // ... (Validasi data tetap sama)

        // Cari data masjid
        $masjid = Masjid::findOrFail($id);

        // Cek otorisasi: Pastikan admin hanya bisa update masjid yang terhubung dengannya
        if (Auth::user()->id_masjid != $masjid->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah data masjid ini.');
        }


        // PERBAIKAN: Mengganti Session::flash dengan with() pada redirect
        return redirect()->route('admin.masjid.index')->with('success', 'Informasi Masjid berhasil diperbarui!');
    }
}
