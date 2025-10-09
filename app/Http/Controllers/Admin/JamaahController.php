<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Jamaah;
use App\Models\Admin\Gender; // Asumsi untuk relasi
use App\Models\Admin\Masjid; // Asumsi untuk relasi
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    /**
     * Tampilkan daftar semua data Jamaah.
     */
    public function index()
    {
        // Ambil semua data Jamaah beserta relasi Gender dan Masjid untuk ditampilkan di tabel
        $jamaahs = Jamaah::with(['gender', 'masjid'])->get();

        return view('admin.jamaah.index', compact('jamaahs'));
    }

    /**
     * Tampilkan form untuk membuat data Jamaah baru.
     */
    public function create()
    {
        // Data yang dibutuhkan untuk dropdown form
        $genders = Gender::all();
        $masjids = Masjid::all();

        return view('admin.jamaah.create', compact('genders', 'masjids'));
    }

    /**
     * Simpan data Jamaah yang baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Lakukan Validasi Data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:jamaah,email', // Pastikan nama tabel benar
            'address' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:20',
            'gender_id' => 'required|exists:genders,id', // Asumsi tabel gender menggunakan 'id'
            'join_date' => 'required|date',
            'id_masjid' => 'required|exists:masjids,id_masjid', // Pastikan nama tabel & kolom benar
        ]);

        // 2. Simpan Data
        Jamaah::create($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('admin.jamaah.index')
                         ->with('success', 'Data Jamaah berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail Jamaah tertentu.
     */
    public function show(Jamaah $jamaah) // Menggunakan Route Model Binding
    {
        // Model Binding akan otomatis mencari berdasarkan Primary Key.
        // Jika PK Anda adalah 'id_jamaah', pastikan properti $primaryKey di model Jamaah sudah diset.
        $jamaah->load(['gender', 'masjid']); // Muat relasi sebelum dikirim ke view

        return view('admin.jamaah.show', compact('jamaah'));
    }

    /**
     * Tampilkan form untuk mengedit data Jamaah tertentu.
     */
    public function edit(Jamaah $jamaah) // Menggunakan Route Model Binding
    {
        $genders = Gender::all();
        $masjids = Masjid::all();

        return view('admin.jamaah.edit', compact('jamaah', 'genders', 'masjids'));
    }

    /**
     * Perbarui data Jamaah tertentu di database.
     */
    public function update(Request $request, Jamaah $jamaah) // Menggunakan Route Model Binding
    {
        // 1. Lakukan Validasi Data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            // Gunakan Rule::unique untuk mengabaikan email user yang sedang diedit
            'email' => 'nullable|email|unique:jamaah,email,' . $jamaah->id_jamaah . ',id_jamaah',
            'address' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:20',
            'gender_id' => 'required|exists:genders,id',
            'join_date' => 'required|date',
            'id_masjid' => 'required|exists:masjids,id_masjid',
        ]);

        // 2. Perbarui Data
        $jamaah->update($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('admin.jamaah.index')
                         ->with('success', 'Data Jamaah berhasil diperbarui!');
    }

    /**
     * Hapus data Jamaah tertentu dari database.
     */
    public function destroy(Jamaah $jamaah) // Menggunakan Route Model Binding
    {
        $jamaah->delete();

        return redirect()->route('admin.jamaah.index')
                         ->with('success', 'Data Jamaah berhasil dihapus!');
    }
}
