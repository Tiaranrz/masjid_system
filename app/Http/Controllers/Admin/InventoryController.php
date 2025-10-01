<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin\Inventory; // Asumsi Model Inventory Anda ada di sini

class InventoryController extends Controller
{
    /**
     * Menampilkan daftar semua item inventaris.
     */
    public function index()
    {
        // Mendapatkan semua data inventaris dengan paginasi
        $inventory_list = Inventory::latest()->paginate(10);

        return view('admin.inventory.index', compact('inventory_list'));
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
        // --- Perbaikan: Menambahkan category dan price ke Validasi Store ---
        $validatedData = $request->validate([
            'name'             => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'price'            => 'required|numeric|min:0',
            'quantity'         => 'required|integer|min:1',
            'unit'             => 'required|string|max:50',
            'status'           => 'required|in:baik,rusak_ringan,rusak_berat',
            'location'         => 'nullable|string|max:255',
            'acquisition_date' => 'nullable|date',
            'description'      => 'nullable|string',
        ]);
        // ------------------------------------------------------------------

        Inventory::create($validatedData);

        Session::flash('success', 'Item inventaris baru berhasil ditambahkan.');
        return redirect()->route('admin.inventory.index');
    }

    /**
     * Menampilkan detail item inventaris tertentu.
     */
    public function show(Inventory $inventory)
    {
        return view('admin.inventory.show', compact('inventory'));
    }

    /**
     * Menampilkan formulir untuk mengedit item inventaris tertentu.
     */
    public function edit(Inventory $inventory)
    {
        return view('admin.inventory.edit', compact('inventory'));
    }

    /**
     * Memperbarui item inventaris tertentu di database.
     */
    public function update(Request $request, Inventory $inventory)
    {
        // --- Perbaikan: Menambahkan category dan price ke Validasi Update ---
        $validatedData = $request->validate([
            'name'             => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'price'            => 'required|numeric|min:0',
            'quantity'         => 'required|integer|min:1',
            'unit'             => 'required|string|max:50',
            'status'           => 'required|in:baik,rusak_ringan,rusak_berat',
            'location'         => 'nullable|string|max:255',
            'acquisition_date' => 'nullable|date',
            'description'      => 'nullable|string',
        ]);
        // --------------------------------------------------------------------

        $inventory->update($validatedData);

        Session::flash('success', 'Item inventaris berhasil diperbarui.');
        return redirect()->route('admin.inventory.index');
    }

    /**
     * Menghapus item inventaris tertentu dari database.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        Session::flash('success', 'Item inventaris berhasil dihapus.');
        return redirect()->route('admin.inventory.index');
    }
}
