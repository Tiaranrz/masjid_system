@extends('admin.layouts.app')

@section('title', 'Manajemen Keuangan')

@section('title_header', 'Pusat Manajemen Keuangan')

@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pilih Kategori Transaksi Pemasukan</h4>
                        <p class="mb-0">Akses modul spesifik Donasi atau ZISWAF untuk pengelolaan data yang rinci.</p>
                    </div>
                </div>
                <div class="card-body">
                    
                    {{-- Status Notifikasi (Success/Error) --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        
                        {{-- Dropdown / Card Menu: Donasi --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-soft-primary shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="ri-wallet-3-line ri-3x text-primary me-3"></i>
                                        <div>
                                            <h5 class="mb-1">Donasi Umum</h5>
                                        </div>
                                    </div>
                                    
                                    <h6 class="text-primary mt-3">Kategori Donasi:</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="ri-check-line me-2"></i>Donasi Kas Mingguan</li>
                                        <li><i class="ri-check-line me-2"></i>Donasi Khusus Pembangunan</li>
                                        <li><i class="ri-check-line me-2"></i>Infaq Harian</li>
                                    </ul>

                                    <a href="{{ route('admin.keuangan.donasi') }}" class="btn btn-primary btn-sm mt-3 w-100">
                                        Kelola Donasi <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Dropdown / Card Menu: ZISWAF --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-soft-success shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="ri-hand-coin-line ri-3x text-success me-3"></i>
                                        <div>
                                            <h5 class="mb-1">ZISWAF</h5>
                                        </div>
                                    </div>
                                    
                                    <h6 class="text-success mt-3">Kategori ZISWAF:</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="ri-check-line me-2"></i>Zakat Fitrah/Maal</li>
                                        <li><i class="ri-check-line me-2"></li>Infak</li>
                                        <li><i class="ri-check-line me-2"></i>Sedekah Jariyah</li>
                                        <li><i class="ri-check-line me-2"></i>Penerimaan Wakaf</li>
                                    </ul>   
                                    <a href="{{ route('admin.keuangan.index') }}" class="btn btn-success btn-sm mt-3 w-100">
                                        Kelola ZISWAF <i class="ri-arrow-right-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection