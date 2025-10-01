<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event; // Pastikan Model Event sudah benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Tampilkan daftar event/kegiatan.
     */
    public function index(Request $request)
    {
        $events = Event::latest()->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'              =>'required|string|max:255',
            'category'          =>'required|string|max:100',
            'description'       =>'nullable|string',
            'tanggal_mulai'     =>'nullable|date',
            'tanggal_selesai'   =>'nullable|date',
            'location'          =>'nullable|string|max:255',
        ]); // <--- [PERBAIKAN SINTAKS: Tambah titik koma]

        Event::create($validateData);
        Session::flash('success', 'event baru berhasil ditambahkan.');
        return redirect()->route('admin.event.index');

    } // <--- [PERBAIKAN SINTAKS: Tambah kurung kurawal penutup untuk method store()]

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validateData = $request->validate([
            'name'              =>'required|string|max:255',
            'category'          =>'required|string|max:100',
            'description'       =>'nullable|string',
            'tanggal_mulai'     =>'nullable|date',
            'tanggal_selesai'   =>'nullable|date',
            'location'          =>'nullable|string|max:255',
        ]); // <--- [PERBAIKAN SINTAKS: Tambah titik koma]

        // [PERBAIKAN LOGIKA: Tambah proses update data]
        $event->update($validateData);

        Session::flash('success', 'event baru telah di perbarui.');
        return redirect()->route('admin.event.index');
    }

    public function destroy(Event $event)
    {
        // [PERBAIKAN LOGIKA: Ganti $inventory dengan $event]
        $event->delete();

        Session::flash('success', 'event berhasil di hapus');
        return redirect()->route('admin.event.index');
    }
}
