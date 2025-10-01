@extends('admin.layouts.app')

@section('title', 'Dashboard Admin Masjid')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="overflow-hidden d-slider1 ">
                    <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
        {{-- KOLOM UTAMA: Statistik Harian (4 Cards Swiper) --}}
{{-- Card 1: Total Jamaah Terdaftar --}}
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-01" class="text-center circle-progress circle-progress-primary"
                                        data-min-value="0" data-max-value="100" data-value="{{ min($totalJamaah / 100, 100) }}" data-type="percent">
                                        <i class="ri-group-line ri-2x text-primary"></i>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Total Jamaah</p>
                                        <h4 class="counter">{{ $totalJamaah }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- Card 2: Pemasukan Donasi Bulan Ini --}}
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-02" class="text-center circle-progress circle-progress-success"
                                        data-min-value="0" data-max-value="100" data-value="{{ min($totalDonasiBulanIni / 1000000, 100) }}" data-type="percent">
                                        <i class="fas fa-user-shield fa-2x text-success"></i>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Donasi Bulan Ini</p>
                                        <h4 class="counter">{{ $totalDonasiBulanIni }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Card 3: Pemasukan ZISWAF Bulan Ini --}}
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-03" class="text-center circle-progress circle-progress-warning"
                                        data-min-value="0" data-max-value="100" data-value="{{ min($totalZiswafBulanIni / 500000, 100) }}" data-type="percent">
                                        <i class="ri-exchange-dollar-line ri-2x text-warning"></i>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">ZISWAF Bulan Ini</p>
                                        <h4 class="counter">{{ $totalZiswafBulanIni }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Card 4: Jamaah Aktif --}}
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-04" class="text-center circle-progress circle-progress-danger"
                                        data-min-value="0" data-max-value="100" data-value="{{ min($totalJamaahAktif / 100, 100) }}" data-type="percent">
                                        <i class="ri-user-star-line ri-2x text-danger"></i>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Jamaah Aktif</p>
                                        <h4 class="counter">{{ $totalJamaahAktif }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
            {{-- Grafik Keuangan Bulanan --}}
            <div class="card" data-aos="fade-up" data-aos-delay="800">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Grafik Pemasukan Keuangan</h4>
                        <p class="mb-0">Perbandingan Donasi dan ZISWAF Masjid (Tahun Ini)</p>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButtonChart" data-bs-toggle="dropdown" aria-expanded="false">
                            Tahun Ini
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonChart">
                            <li><a class="dropdown-item" href="#">Bulan Ini</a></li>
                            <li><a class="dropdown-item" href="#">Tahun Ini</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Placeholder untuk Grafik Bar/Line Chart --}}
                    <div id="keuangan-chart" class="d-main" style="height: 350px; display: flex; align-items: center; justify-content: center; background-color: #f9f9f9;">
                        <p class="text-muted">Placeholder Grafik (Misal: Pemasukan per bulan)</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Aktivitas Terbaru & Rekap --}}
        <div class="col-md-12 col-lg-4">

            {{-- Card Jadwal Kegiatan Terbaru (menggunakan data $aktivitasKegiatan) --}}
            <div class="card" data-aos="fade-up" data-aos-delay="600">
                <div class="flex-wrap card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="mb-2 card-title">Jadwal Kegiatan Terdekat</h4>
                        <p class="mb-0 text-success">
                            <i class="ri-calendar-event-fill me-1"></i>
                        </p>
                    </div>
                </div>
                <div class="p-0 card-body">
                    <div class="mt-4 table-responsive">
                        <table class="table mb-0 table-striped" role="grid">
                            <thead>
                                <tr>
                                    <th>EVENT</th>
                                    <th>TANGGAL</th>
                                    <th>PJ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Looping Data Kegiatan dari Controller ($aktivitasKegiatan) --}}
                                @if(isset($aktivitasKegiatan) && count($aktivitasKegiatan) > 0)
                                    @foreach($aktivitasKegiatan as $kegiatan)
                                    <tr>
                                        <td><h6 class="mb-0">{{ $kegiatan->nama_kegiatan }}</h6></td>
                                        <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M') }}</td>
                                        <td>{{ $kegiatan->penanggung_jawab }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada kegiatan dalam waktu dekat.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Card Rekapitulasi Keuangan Singkat (Hanya Donasi & ZISWAF) --}}
            <div class="card" data-aos="fade-up" data-aos-delay="900">
                <div class="card-header border-0">
                    <h5 class="card-title">Rekap Pemasukan (Bulan Ini)</h5>
                </div>
                <div class="card-body">

                    {{-- Rekap Donasi Umum --}}
                    <div class="mb-4">
                        <div class="flex-wrap d-flex justify-content-between">
                            <h2 class="mb-2 text-success">Rp {{ number_format($totalDonasiBulanIni, 0, ',', '.') }}</h2>
                            <div>
                                <span class="badge bg-success rounded-pill">DONASI UMUM</span>
                            </div>
                        </div>
                        <p class="text-muted">Total penerimaan Donasi bulan ini</p>
                    </div>

                    {{-- Rekap ZISWAF --}}
                    <div class="mb-4">
                        <div class="flex-wrap d-flex justify-content-between">
                            <h2 class="mb-2 text-warning">Rp {{ number_format($totalZiswafBulanIni, 0, ',', '.') }}</h2>
                            <div>
                                <span class="badge bg-warning rounded-pill">ZISWAF</span>
                            </div>
                        </div>
                        <p class="text-muted">Total penerimaan ZISWAF bulan ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
