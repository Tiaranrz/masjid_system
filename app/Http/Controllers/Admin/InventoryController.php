<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Inventory; // ← PERBAIKI: Hapus "Admin\"

class InventoryController extends Controller
{
    /**
     * Menampilkan daftar semua item inventaris.
     */
    public function index()
    {
        $currentTenant = session('current_tenant_id', 'masjid1');
        $inventory = Inventory::forTenant($currentTenant)->get();

        return view('admin.inventory.index', compact('inventory')); // ← PERBAIKI: hapus 'asset'
    }

    /**
     * Menampilkan formulir untuk menambahkan item inventaris baru.
     */
    public function create()
    {
        return view('admin.inventory.create');
    }

    /**
     * Menyimpan item inventaris baru ke database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255', // ← 'name' bukan 'asset_name'
        'category' => 'required|string|max:255',
        'price' => 'required|numeric|min:0', // ← 'price' bukan 'asset_price'
        'quantity' => 'required|integer|min:1', // ← 'quantity' bukan 'unit'
        'unit' => 'required|string|max:50',
        'status' => 'required|in:baik,rusak,perbaikan,hilang', // ← sesuai enum di tabel
        'location' => 'nullable|string|max:255',
        'acquisition_date' => 'nullable|date',
        'description' => 'nullable|string',
    ]);

    // Tambahkan tenant_id otomatis
    $validated['tenant_id'] = session('current_tenant_id', 'masjid1');

    Inventory::create($validated);

    return redirect()->route('admin.inventory.index')
        ->with('success', 'Asset berhasil ditambahkan.');
    }
    /**
     * Menampilkan detail item inventaris tertentu.
     */
    public function show($id) // ← PERBAIKI: gunakan $id bukan Model Binding
    {
        $currentTenant = session('current_tenant_id', 'masjid1');
        $inventory = Inventory::forTenant($currentTenant)->findOrFail($id);

        return view('admin.inventory.show', compact('inventory'));
    }

    /**
     * Menampilkan formulir untuk mengedit item inventaris tertentu.
     */
    public function edit($id) // ← PERBAIKI: gunakan $id bukan Model Binding
    {
        $currentTenant = session('current_tenant_id', 'masjid1');
        $inventory = Inventory::forTenant($currentTenant)->findOrFail($id);

        return view('admin.inventory.edit', compact('inventory'));
    }

    /**
     * Memperbarui item inventaris tertentu di database.
     */
    public function update(Request $request, $id) // ← PERBAIKI: gunakan $id bukan Model Binding
    {
        $currentTenant = session('current_tenant_id', 'masjid1');
        $inventory = Inventory::forTenant($currentTenant)->findOrFail($id);

        // Validasi sesuai dengan form create
        $validatedData = $request->validate([
            'asset_name' => 'required|string|max:255', // ← SESUAIKAN dengan store method
            'category' => 'required|string|max:255',
            'unit' => 'required|integer|min:1',
            'asset_price' => 'required|integer|min:0',
            'condition' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Rusak,Dalam Perbaikan',
        ]);

        $inventory->update($validatedData);

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Item inventaris berhasil diperbarui.');
    }

    /**
     * Menghapus item inventaris tertentu dari database.
     */
    public function destroy($id) // ← PERBAIKI: gunakan $id bukan Model Binding
    {
        $currentTenant = session('current_tenant_id', 'masjid1');
        $inventory = Inventory::forTenant($currentTenant)->findOrFail($id);

        $inventory->delete();

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Item inventaris berhasil dihapus.');
    }
}
