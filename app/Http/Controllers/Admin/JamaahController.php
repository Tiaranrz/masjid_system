<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jamaah;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    /**
     * Tampilkan daftar jamaah.
     */
    public function index()
    {
        $jamaah = Jamaah::latest()->paginate(10);
        $totalJamaah = Jamaah::count();
          $totalJamaahAktif = Jamaah::where('status', 'aktif')->count();

        return view('admin.jamaah.index', compact('jamaah', 'totalJamaah', 'totalJamaahAktif'));

    }

    /**
     * Form tambah jamaah.
     */
    public function create()
    {
        return view('admin.jamaah.create');
    }

    /**
     * Simpan data jamaah baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Jamaah::create([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
        ]);

        return redirect()->route('admin.jamaah.index')
            ->with('success', 'Data Jamaah berhasil ditambahkan.');
    }

    /**
     * Form edit jamaah.
     */
    public function edit($id)
    {
        $jamaah = Jamaah::findOrFail($id);

        return view('admin.jamaah.edit', compact('jamaah'));
    }

    /**
     * Update data jamaah.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $jamaah = Jamaah::findOrFail($id);

        $jamaah->update([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
        ]);

        return redirect()->route('admin.jamaah.index')
            ->with('success', 'Data Jamaah berhasil diperbarui.');
    }

    /**
     * Hapus data jamaah.
     */
    public function destroy($id)
    {
        $jamaah = Jamaah::findOrFail($id);
        $jamaah->delete();

        return redirect()->route('admin.jamaah.index')
            ->with('success', 'Data Jamaah berhasil dihapus.');
    }
}
