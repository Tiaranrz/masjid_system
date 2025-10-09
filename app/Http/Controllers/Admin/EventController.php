<?php
// app/Http/Controllers/Admin/EventController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $tenantId = session('current_tenant_id', 'masjid1');
        $events = Event::forTenant($tenantId)
                      ->orderBy('event_date', 'desc')
                      ->get();

        return view('admin.events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_event' => 'required|string|max:150',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,ongoing,finished',
            'masjid' => 'nullable|string|max:255'
        ]);

        // Tambahkan tenant_id otomatis
        $validatedData['tenant_id'] = session('current_tenant_id', 'masjid1');

        Event::create($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    // Update method lainnya juga...
    public function edit($id)
    {
        $tenantId = session('current_tenant_id', 'masjid1');
        $event = Event::forTenant($tenantId)->findOrFail($id);

        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $tenantId = session('current_tenant_id', 'masjid1');
        $event = Event::forTenant($tenantId)->findOrFail($id);

        // ... validasi dan update
    }

    public function destroy($id)
    {
        $tenantId = session('current_tenant_id', 'masjid1');
        $event = Event::forTenant($tenantId)->findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
