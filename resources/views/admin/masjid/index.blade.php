@extends('admin.layouts.app')

@section('title', 'Profil Masjid')

@section('content')

<div class="container-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            {{-- Logo / Foto Masjid --}}
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                                <img src="{{ asset('assets/images/avatars/01.png') }}" alt="Masjid" class="theme-color-default-img img-fluid rounded avatar-100">
                            </div>
                            <div>
                                <h4 class="me-2 h4">{{ $masjid->name_masjid }}</h4>
                                <span class="badge bg-success text-capitalize">
                                    {{ $masjid->status ?? 'pending' }}
                                </span>
                            </div>
                        </div>

                        {{-- Tabs --}}
                        <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" id="profile-pills-tab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#profil-masjid" role="tab">Detail Masjid</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#pengurus-masjid" role="tab">Struktur Pengurus</a>
                           </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Tab --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="profile-content tab-content">

                {{-- TAB 1: DETAIL MASJID --}}
                <div id="profil-masjid" class="tab-pane fade active show">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Masjid</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <h6 class="text-primary">Kontak & Alamat</h6>
                                    <p><strong>Alamat:</strong> {{ $masjid->address }}</p>
                                    <p><strong>No. Telepon:</strong> {{ $masjid->phone ?? '-' }}</p>
                                    <p><strong>Email:</strong> {{ $masjid->email ?? '-' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="text-primary">Informasi Lain</h6>
                                    <p><strong>Tahun SK:</strong> {{ $masjid->tahun_sk ?? '-' }}</p>
                                    <p><strong>Luas Bangunan:</strong> {{ $masjid->luas_bangunan ?? '-' }} m²</p>
                                    <p><strong>Luas Tanah:</strong> {{ $masjid->luas_tanah ?? '-' }} m²</p>
                                </div>
                            </div>

                            {{-- Tombol Edit --}}
                            <div class="mt-4">
                                <a href="{{ route('admin.masjid.edit', $masjid->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TAB 2: STRUKTUR PENGURUS --}}
                <div id="pengurus-masjid" class="tab-pane fade">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Struktur Pengurus Masjid</h4>
                        </div>
                        <div class="card-body">
                            {!! $masjid->management_structure ?? '<p>Belum ada data struktur pengurus</p>' !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
