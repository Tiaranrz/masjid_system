@extends('admin.layouts.app')

@section('title', 'Profil Pengguna')

@section('content')

{{-- Container Utama Profil --}}
<div class="conatiner-fluid content-inner mt-n5 py-8">
<div class="row">
    <div class="col-lg-12">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                            {{-- Foto Profil --}}
                            <img src="{{ asset('assets/images/avatars/avtar_1.png') }}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                        </div>
                        <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                            {{-- Nama dan Role Pengguna --}}
                            <h4 class="me-2 h4">{{ Auth::user()->name }}</h4>
                            <span class="badge bg-primary text-capitalize">{{ Auth::user()->role ?? 'Jamaah' }}</span>
                        </div>
                    </div>

                    {{-- Tabs Navigasi (Diambil dari User Profile HTML) --}}
                    <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                       <li class="nav-item">
                          <a class="nav-link active" data-bs-toggle="tab" href="#profile-detail" role="tab" aria-selected="true">Detail Profil</a>
                       </li>
                       <li class="nav-item">
                          <a class="nav-link" data-bs-toggle="tab" href="#profile-security" role="tab" aria-selected="false">Pengaturan Keamanan</a>
                       </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="profile-content tab-content">

            {{-- TAB 1: DETAIL PROFIL (Menggunakan Struktur Card) --}}
            <div id="profile-detail" class="tab-pane fade active show">
                <div class="card">
                    <div class="card-header">
                       <div class="header-title">
                          <h4 class="card-title">Nama Masjid</h4>
                       </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            {{-- Blok Kiri: Data Kontak --}}
                            <div class="col-md-6">
                                <h6 class="mb-3 text-primary">Informasi Kontak</h6>
                                <div class="mt-2">
                                    <h6 class="mb-1">Email:</h6>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                                <div class="mt-2">
                                    <h6 class="mb-1">Nomor HP:</h6>
                                    <p>{{ Auth::user()->phone_number ?? 'Belum ada' }}</p>
                                </div>
                                <div class="mt-2">
                                    <h6 class="mb-1">Jenis Kelamin:</h6>
                                    <p>{{ Auth::user()->gender_id ? (Auth::user()->gender_id == 1 ? 'Laki-laki' : 'Perempuan') : 'Belum ada' }}</p>
                                </div>
                            </div>

                            {{-- Blok Kanan: Informasi Tambahan --}}
                            <div class="col-md-6">
                                <h6 class="mb-3 text-primary">Informasi Admin Masjid</h6>
                                <div class="mt-2">
                                    <h6 class="mb-1">Role Utama:</h6>
                                    <p>{{ Auth::user()->role ?? 'N/A' }}</p>
                                </div>
                                @if (Auth::user()->id_masjid)
                                <div class="mt-2">
                                    <h6 class="mb-1">Masjid Dikelola:</h6>
                                    <p>{{ Auth::user()->masjid->name ?? 'Tidak Ditemukan' }}</p>
                                </div>
                                @endif
                                <div class="mt-2">
                                    <h6 class="mb-1">Tahun Berdiri(SK):</h6>
                                    <p>{{ Auth::user()->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Edit --}}
                        <div class="mt-4">
                            <a href="#" class="btn btn-warning">Edit Detail Profil</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TAB 2: PENGATURAN KEAMANAN (Password Reset) --}}
            <div id="profile-security" class="tab-pane fade">
                <div class="card">
                     <div class="card-header">
                        <div class="header-title">
                           <h4 class="card-title">Ubah Kata Sandi</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            @method('PUT')
                           <div class="form-group">
                              <label for="currentPassword" class="form-label">Kata Sandi Saat Ini</label>
                              <input type="password" class="form-control" id="currentPassword" name="current_password" required>
                           </div>
                           <div class="form-group">
                              <label for="newPassword" class="form-label">Kata Sandi Baru</label>
                              <input type="password" class="form-control" id="newPassword" name="new_password" required>
                           </div>
                           <div class="form-group">
                              <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi Baru</label>
                              <input type="password" class="form-control" id="confirmPassword" name="new_password_confirmation" required>
                           </div>
                           <button type="submit" class="btn btn-danger">Simpan Perubahan Kata Sandi</button>
                        </form>
                     </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
