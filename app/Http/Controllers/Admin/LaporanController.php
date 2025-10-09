<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\LaporanService; // <-- IMPORT SERVICE BARU

// Tidak perlu lagi mengimpor Keuangan, Event, Inventory di sini karena sudah ada di Service
// use App\Models\Admin\Keuangan;
// use App\Models\Event;
// use App\Models\Admin\Inventory;

class LaporanController extends Controller
{
    protected $laporanService;

    // Gunakan Constructor Injection untuk Service
    public function __construct(LaporanService $laporanService)
    {
        $this->laporanService = $laporanService;
    }

    /**
     * Menampilkan halaman indeks Laporan (Landing Page).
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

        // Panggil Service untuk mengambil data
        $reportData = $this->laporanService->getKeuanganReport((int) $month, (int) $year);

        return view('admin.laporan.keuangan', $reportData);
    }

    /**
     * Menampilkan Laporan Kegiatan (Event).
     */
    public function kegiatan(Request $request)
    {
        $dateFrom = $request->input('from') ? Carbon::parse($request->input('from')) : Carbon::now()->subMonths(6);
        $dateTo = $request->input('to') ? Carbon::parse($request->input('to')) : Carbon::now();

        // Panggil Service untuk mengambil data
        $reportData = $this->laporanService->getKegiatanReport($dateFrom, $dateTo);

        return view('admin.laporan.kegiatan', $reportData);
    }

    /**
     * Menampilkan Laporan Inventory (Aset).
     */
    public function inventory()
    {
        // Panggil Service untuk mengambil data
        $reportData = $this->laporanService->getInventoryReport();

        return view('admin.laporan.inventory', $reportData);
    }
}
