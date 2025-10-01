<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Jamaah;
use App\Models\Admin\Ziswaf;
use App\Models\Admin\Keuangan;// Tambahkan Model Keuangan Anda
use App\Models\Admin\Event;
use Carbon\Carbon; // Tambahkan Carbon untuk penanganan tanggal
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan bulan dan tahun saat ini
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // --- Statistik Utama ---
        $totalJamaah = Jamaah::count();
        $totalJamaahAktif = Jamaah::where('status', 'aktif')->count();
        $eventTerbaru = Event::count();
        $totalZiswaf = Ziswaf::count(); // Ini masih count(), mungkin Anda ingin sum()

        // --- Data Keuangan yang Hilang ---
        // Asumsi Model Keuangan memiliki kolom 'type' ('pemasukan'/'pengeluaran') dan 'amount'

        // 1. Hitung Total Donasi Bulan Ini
        $totalDonasiBulanIni = Keuangan::where('type', 'donasi')
                                            ->whereMonth('created_at', $currentMonth)
                                            ->whereYear('created_at', $currentYear)
                                            ->sum('amount'); // Ganti 'amount' jika nama kolom berbeda

        // 2. Hitung Total Pengeluaran Bulan Ini
        $totalZiswafBulanIni = Keuangan::where('type', 'Ziswaf')
                                            ->whereMonth('created_at', $currentMonth)
                                            ->whereYear('created_at', $currentYear)
                                            ->sum('amount'); // Ganti 'amount' jika nama kolom berbeda

        // 3. Data Aktivitas Kegiatan (Dummy/Contoh)
        // Anda perlu mengambil data ini dari database untuk mengisi tabel di view
        $aktivitasKegiatan = [
            (object)['nama_kegiatan' => 'Pengajian Rutin', 'tanggal' => Carbon::now()->addDays(1), 'penanggung_jawab' => 'Ust. Ahmad'],
            (object)['nama_kegiatan' => 'Bakti Sosial', 'tanggal' => Carbon::now()->addDays(5), 'penanggung_jawab' => 'Panitia Sosial'],
            // ... Tambahkan query database yang sesungguhnya di sini
        ];

        return view('admin.dashboard', compact(
            'totalJamaah',
            'totalJamaahAktif',
            'eventTerbaru',
            'totalZiswaf',
            'totalDonasiBulanIni',    // Variabel yang hilang
            'totalZiswafBulanIni', // Variabel yang hilang
            'aktivitasKegiatan'
        ));
    }

    public function calender()
    {
        return view('app.calender');
    }

    public function kanban()
    {
        return view('app.kanban');
    }
}
