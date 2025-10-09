<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Admin\Keuangan; // Diambil dari import di Controller Anda
use App\Models\Event;          // Diambil dari import di Controller Anda
use App\Models\Admin\Inventory; // Diambil dari import di Controller Anda

/**
 * Class LaporanService
 * Bertindak sebagai pusat logika untuk mengumpulkan dan memproses data laporan.
 */
class LaporanService
{
    /**
     * Mengambil data dan ringkasan Laporan Keuangan (Donasi, Ziswaf) berdasarkan bulan/tahun.
     *
     * @param int $month
     * @param int $year
     * @return array
     */
    public function getKeuanganReport(int $month, int $year): array
    {
        // 1. Mengambil data transaksi
        $transactions = Keuangan::whereMonth('transaction_date', $month)
                            ->whereYear('transaction_date', $year)
                            ->latest('transaction_date')
                            ->paginate(20);

        // 2. Menghitung ringkasan
        // Catatan: Collection harus direset sebelum melakukan penghitungan terpisah
        $transactionsData = $transactions->items(); // Ambil item dari paginator untuk perhitungan

        $totalDonasi = collect($transactionsData)->where('type', 'donasi')->sum('amount');
        $totalZiswaf = collect($transactionsData)->where('type', 'ziswaf')->sum('amount');

        return [
            'transactions' => $transactions, // Mengembalikan Paginator
            'totalDonasi' => $totalDonasi,
            'totalZiswaf' => $totalZiswaf,
            'month' => $month,
            'year' => $year,
        ];
    }

    /**
     * Mengambil Laporan Kegiatan (Event) berdasarkan rentang tanggal.
     *
     * @param Carbon $dateFrom
     * @param Carbon $dateTo
     * @return array
     */
    public function getKegiatanReport(Carbon $dateFrom, Carbon $dateTo): array
    {
        $events = Event::whereBetween('start_date', [$dateFrom, $dateTo])
                        ->orderBy('start_date', 'asc')
                        ->get();

        $totalEvents = $events->count();

        return [
            'events' => $events,
            'totalEvents' => $totalEvents,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ];
    }

    /**
     * Mengambil Laporan Inventory dan ringkasan status aset.
     *
     * @return array
     */
    public function getInventoryReport(): array
    {
        $totalAsets = Inventory::count();

        // Hitung status berdasarkan kolom 'status' (atau 'condition' jika lebih sesuai)
        // Saya asumsikan kolomnya 'status' sesuai dengan logika Anda yang lain
        $statusBaik = Inventory::where('status', 'Baik')->count();
        $statusDipinjam = Inventory::where('status', 'Dipinjam')->count();
        $statusRusak = Inventory::whereIn('status', ['Rusak Ringan', 'Rusak Berat'])->count();

        $inventoryList = Inventory::latest()->paginate(20);

        return [
            'totalAsets' => $totalAsets,
            'statusBaik' => $statusBaik,
            'statusDipinjam' => $statusDipinjam,
            'statusRusak' => $statusRusak,
            'inventoryList' => $inventoryList,
        ];
    }
}
