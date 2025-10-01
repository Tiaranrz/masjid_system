<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masjid;
use Illuminate\Support\Str;

class MasjidsController extends Controller
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
            'name'          => 'required|string|max:255',
            'address'       => 'nullable|string',
            'contact_person'=> 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255',
            'description'   => 'nullable|string',
            'status'        => 'nullable|in:active,inactive',
        ]);

        Masjid::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'address'       => $request->address,
            'contact_person'=> $request->contact_person,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'description'   => $request->description,
            'status'        => $request->status ?? 'active',
        ]);

        return redirect()->route('superadmin.masjid.index')
            ->with('success', 'Masjid berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $masjid = Masjid::findOrFail($id);
        return view('superadmin.masjid.edit', compact('masjid'));
    }

    public function update(Request $request, $id)
    {
        $masjid = Masjid::findOrFail($id);
        $masjid->update($request->all());
        return redirect()->route('superadmin.masjid.index')->with('success', 'Masjid berhasil diperbarui.');
    }

    public function show($id)
    {
        $masjid = Masjid::with(['users.role'])->findOrFail($id);
        return view('superadmin.masjid.show', compact('masjid'));
    }

    public function destroy($id)
    {
        Masjid::destroy($id);
        return redirect()->route('superadmin.masjid.index')->with('success', 'Masjid berhasil dihapus.');
    }
}
