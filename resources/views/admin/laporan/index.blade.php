@extends('admin.layouts.app')

@section('title', 'Modul Laporan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header border-bottom-0">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pilih Jenis Laporan</h4>
                    </div>

                    {{-- NAVIGASI TAB/PILLS (Mengadaptasi Layout Billing) --}}
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        {{-- Tab Laporan Keuangan --}}
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.laporan.keuangan') }}">
                            </a>
                        </li>

                        {{-- Tab Laporan Kegiatan --}}
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.laporan.kegiatan') }}">

                            </a>
                        </li>

                        {{-- Tab Laporan Inventory --}}
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('admin.laporan.inventory') }}">

                            </a>
                        </li>
                    </ul>

                    {{-- Tombol Utama --}}
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-download me-2"></i> Export PDF
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    {{-- Keterangan: Karena setiap link di atas mengarah ke halaman Rute Laporan yang berbeda,
                       Konten (tab-pane) tidak diperlukan di sini. Konten akan dimuat di masing-masing halaman.
                       Halaman ini hanya berfungsi sebagai navigasi utama. --}}
                    <p class="text-center text-muted">Silakan pilih salah satu tab laporan di atas untuk melihat detail.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
