<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    /**
     * Menampilkan semua transaksi keuangan (Donasi & ZISWAF)
     */
    public function index(Request $request)
    {
        $jenis = $request->query('jenis');
        $query = Keuangan::query();

        if ($jenis && in_array($jenis, ['donasi', 'ziswaf'])) {
            $query->where('jenis', $jenis);
        }

        $transaksis = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.keuangan.index', compact('transaksis', 'jenis'));
    }

    /**
     * Menampilkan form untuk membuat transaksi baru
     */
    public function create()
    {
        return view('admin.keuangan.create');
    }

    /**
     * Menyimpan transaksi baru ke database - SESUAI STRUCTURE TABLE
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'jenis' => ['required', Rule::in(['donasi', 'ziswaf'])],
        'nama' => 'required|string|max:255', // Form mengirim 'nama'
        'jumlah' => 'required|numeric|min:1000',
        'tanggal' => 'required|date',
        'metode' => 'nullable|string|max:100',
    ]);

    // PERBAIKAN: Gunakan 'nama' bukan 'name'
    Keuangan::create([
        'jenis' => $validatedData['jenis'],
        'nama_donatur' => $validatedData['nama'], // ✅ BENAR: 'nama'
        'jumlah' => $validatedData['jumlah'],
        'tanggal' => $validatedData['tanggal'],
        'metode_pembayaran' => $validatedData['metode'],
    ]);

    return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil ditambahkan.');
}

    /**
     * Menampilkan detail satu transaksi
     */
    public function show($id)
    {
        $transaksi = Keuangan::findOrFail($id);
        return view('admin.keuangan.show', compact('transaksi'));
    }

    /**
     * Menampilkan form untuk mengedit transaksi
     */
    public function edit($id)
    {
        $transaksi = Keuangan::findOrFail($id);
        return view('admin.keuangan.edit', compact('transaksi'));
    }

    /**
     * Memperbarui transaksi di database - SESUAI STRUCTURE TABLE
     */
    public function update(Request $request, $id)
    {
        $transaksi = Keuangan::findOrFail($id);

        $validatedData = $request->validate([
            'jenis' => ['required', Rule::in(['donasi', 'ziswaf'])],
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1000',
            'tanggal' => 'required|date',
            'metode' => 'nullable|string|max:100',
            // HAPUS field yang tidak ada di table
        ]);

        $transaksi->update([
            'jenis' => $validatedData['jenis'],
            'nama_donatur' => $validatedData['nama'],
            'jumlah' => $validatedData['jumlah'],
            'tanggal' => $validatedData['tanggal'],
            'metode_pembayaran' => $validatedData['metode'],
        ]);

        return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Menghapus transaksi dari database
     */
    public function destroy($id)
    {
        $transaksi = Keuangan::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
