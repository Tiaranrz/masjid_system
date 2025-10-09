<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasjidController extends Controller
{
    /**
     * Menampilkan halaman profil masjid untuk admin.
     */
    public function index()
    {
    $masjidId = Auth::user()->id_masjid;

        $masjid = Masjid::findOrFail($masjidId);
        return view('admin.masjid.index', compact('masjid'));
    }

    /**
     * Memperbarui informasi profil masjid.
     */
    public function update(Request $request, $id)
    {
        // Validasi inputan
        $request->validate([
            'name_masjid' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'instagram_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'description' => 'nullable|string',
            'tahun_sk' => 'nullable|integer',
            'luas_bangunan' => 'nullable|numeric',
            'luas_tanah' => 'nullable|numeric',
        ]);

        // Cari data masjid
        $masjid = Masjid::findOrFail($id);

        // ✅ pastikan hanya admin masjid terkait yang bisa update
        if (Auth::user()->id_masjid != $masjid->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin mengubah data masjid ini.');
        }

        // Update data masjid
        $masjid->update($request->only([
            'name_masjid',
            'address',
            'phone',
            'email',
            'instagram_link',
            'facebook_link',
            'description',
            'tahun_sk',
            'luas_bangunan',
            'luas_tanah',
        ]));

        return redirect()->route('admin.masjid.index')
            ->with('success', 'Informasi Masjid berhasil diperbarui!');
    }

    public function edit($id)
    {
    $masjid = Masjid::findOrFail($id);

    // pastikan hanya admin yang punya akses masjid ini
    if (Auth::user()->id_masjid != $masjid->id) {
        return redirect()->route('admin.masjid.index')->with('error', 'Anda tidak memiliki izin.');
    }

    return view('admin.masjid.edit', compact('masjid'));
    }
}
