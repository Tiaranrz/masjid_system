<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Masjid;
use App\Models\Admin\Jamaah;
use App\Models\Admin\Ziswaf;
use App\Models\Admin\Keuangan;
use App\Models\Event;
use App\Models\Admin\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 🕒 Ambil bulan & tahun saat ini
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        // 📊 Statistik Jamaah
        $totalJamaah = Jamaah::count();
        $totalJamaahAktif = Jamaah::where('status', 'aktif')->count();

        // 📅 Statistik Event & Ziswaf
        $totalEvent = Event::count();
        $totalZiswaf = Ziswaf::count();

        // 💰 PERBAIKAN: Statistik Keuangan - gunakan kolom 'jenis' bukan 'type'
        $totalDonasiBulanIni = Keuangan::where('jenis', 'donasi')
            ->whereMonth('tanggal', $bulan) // PERBAIKAN: gunakan 'tanggal' bukan 'created_at'
            ->whereYear('tanggal', $tahun)
            ->sum('jumlah');

        $totalZiswafBulanIni = Keuangan::where('jenis', 'ziswaf')
            ->whereMonth('tanggal', $bulan) // PERBAIKAN: gunakan 'tanggal' bukan 'created_at'
            ->whereYear('tanggal', $tahun)
            ->sum('jumlah');

        // Total keuangan bulan ini (donasi + ziswaf)
        $totalKeuanganBulanIni = $totalDonasiBulanIni + $totalZiswafBulanIni;

        // 📌 Data aktivitas kegiatan
        $aktivitasKegiatan = Event::take(5)->get();

        if ($aktivitasKegiatan->isEmpty()) {
            $aktivitasKegiatan = collect([
                (object)[
                    'nama_kegiatan' => 'Pengajian Rutin',
                    'tanggal' => Carbon::now()->addDays(1),
                    'penanggung_jawab' => 'Ust. Ahmad'
                ],
                (object)[
                    'nama_kegiatan' => 'Bakti Sosial',
                    'tanggal' => Carbon::now()->addDays(5),
                    'penanggung_jawab' => 'Panitia Sosial'
                ],
            ]);
        } else {
            // Mapping supaya tetap punya nama_kegiatan & tanggal
            $aktivitasKegiatan = $aktivitasKegiatan->map(function ($item) {
                return (object)[
                    'nama_kegiatan' => $item->nama ?? $item->nama_kegiatan ?? 'Kegiatan',
                    'tanggal' => $item->tanggal ?? $item->created_at ?? Carbon::now(),
                    'penanggung_jawab' => $item->penanggung_jawab ?? $item->penanggungjawab ?? '-'
                ];
            });
        }

        // 📝 Kirim data ke view
        return view('admin.dashboard', compact(
            'totalJamaah',
            'totalJamaahAktif',
            'totalEvent',
            'totalZiswaf',
            'totalDonasiBulanIni',
            'totalZiswafBulanIni',
            'totalKeuanganBulanIni',
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
