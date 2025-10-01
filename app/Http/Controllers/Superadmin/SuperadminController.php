<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk superadmin.
     */
    public function dashboard()
    {
        // Hitung total tenant (admin masjid)
        $totalMasjidAktif = User::where('id_role', 2)->count();

        // Hitung total pengguna keseluruhan
        $jumlahPengguna = User::count();
        // Ambil jumlah masjid berdasarkan status (contoh: aktif dan non-aktif)
        $activeMasjid = Masjid::where('status', 'active')->count();
        $inactiveMasjid = Masjid::where('status', 'inactive')->count();

        // Kirimkan kedua variabel ke tampilan (view)
        return view('superadmin.dashboard', compact('totalMasjidtAktif', 'jumlahPengguna'));
    }

    /**
     * Menyimpan data tenant dan user baru ke database.
     */
    public function storeMasjid(Request $request)
    {
        // 1. Validasi data dari form
        $request->validate([
            'nama_masjid' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        // 2. Buat entri baru di tabel 'masjids'
        $masjids = Masjid::create([
            'name' => $request->nama_masjid,
            'slug' => Str::slug($request->nama_masjid),
            'email' => $request->email,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'status' => 'aktif', // Atur status default
        ]);

        // 3. Buat entri baru di tabel 'users' untuk admin tenant
        $user = User::create([
            'name' => $request->contact_person,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 2, // Atur 'id_role' untuk admin, pastikan ID ini benar
            'id_masjid' => $masjids->id, // Hubungkan user dengan tenant yang baru dibuat
        ]);

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('superadmin.masjid.index')->with('success', 'Tenant berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman izin dan peran (role & permission).
     */
    public function rolePermission()
    {
        return view('superadmin.role-permission');
    }
}
