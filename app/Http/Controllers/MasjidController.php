<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Masjid;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index()
    {
        $masjids = Masjid::all();
        return view('superadmin.masjid.index', compact('masjids'));
    }

    public function create()
    {
        return view('superadmin.masjid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Masjid::create($request->all());

        return redirect()->route('masjid.index')->with('success', 'Data masjid berhasil ditambahkan.');
    }

    public function show($id)
    {
        $masjid = Masjid::findOrFail($id);
        return view('superadmin.masjid.show', compact('masjid'));
    }

    public function edit($id)
    {
        $masjid = Masjid::findOrFail($id);
        return view('superadmin.masjid.edit', compact('masjid'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $masjid = Masjid::findOrFail($id);
        $masjid->update($request->all());

        return redirect()->route('masjid.index')->with('success', 'Data masjid berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $masjid = Masjid::findOrFail($id);
        $masjid->delete();

        return redirect()->route('masjid.index')->with('success', 'Data masjid berhasil dihapus.');
    }
}
