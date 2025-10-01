<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Impor Model yang dibutuhkan untuk laporan
use App\Models\Admin\Keuangan;
use App\Models\Event;
use App\Models\Admin\Inventory;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman indeks Laporan (Landing Page).
     * Akan dialihkan ke Laporan Keuangan sebagai default.
     */
    public function index()
    {
         return view('admin.laporan.index'); 
    }

    /**
     * Menampilkan Laporan Keuangan (Donasi dan ZISWAF).
     */
    public function keuangan(Request $request)
    {
        // Mendapatkan filter bulan/tahun dari request (atau default bulan ini)
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        // 1. Mengambil data transaksi
        $transactions = Keuangan::whereMonth('transaction_date', $month)
                                ->whereYear('transaction_date', $year)
                                ->latest('transaction_date')
                                ->paginate(20);

        // 2. Menghitung ringkasan
        $totalDonasi = $transactions->where('type', 'donasi')->sum('amount');
        $totalZiswaf = $transactions->where('type', 'ziswaf')->sum('amount');

        // Catatan: Variabel $totalPengeluaran telah dihapus dari sini.

        return view('admin.laporan.keuangan', compact(
            'transactions',
            'totalDonasi',
            'totalZiswaf',
            'month',
            'year'
        ));
    }

    /**
     * Menampilkan Laporan Kegiatan (Event).
     */
    public function kegiatan(Request $request)
    {
        $dateFrom = $request->input('from', Carbon::now()->subMonths(6));
        $dateTo = $request->input('to', Carbon::now());

        $events = Event::whereBetween('start_date', [$dateFrom, $dateTo])
                       ->orderBy('start_date', 'asc')
                       ->get();

        $totalEvents = $events->count();

        return view('admin.laporan.kegiatan', compact('events', 'totalEvents', 'dateFrom', 'dateTo'));
    }

    /**
     * Menampilkan Laporan Inventory (Aset).
     */
    public function inventory()
    {
        $totalAsets = Inventory::count();
        $statusBaik = Inventory::where('status', 'baik')->count();
        $statusRusakRingan = Inventory::where('status', 'rusak_ringan')->count();
        $statusRusakBerat = Inventory::where('status', 'rusak_berat')->count();

        $inventory_list = Inventory::latest()->paginate(20);

        return view('admin.laporan.inventory', compact(
            'totalAsets',
            'statusBaik',
            'statusRusakRingan',
            'statusRusakBerat',
            'inventory_list'
        ));
    }
}
