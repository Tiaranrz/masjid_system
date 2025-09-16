@extends('superadmin.layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="row">
    {{-- Kolom Kiri: Informasi Dasar dan Avatar --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/images/avatars/01.png') }}" alt="User Avatar" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h4>{{ $user->name }}</h4>
                        <p class="text-secondary mb-1">{{ $user->email }}</p>
                        <p class="text-muted font-size-sm">{{ $user->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Detail Pengguna, Pengaturan, dll. --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Informasi Lengkap</h5>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nomor HP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->phone_number ?? 'Belum ada' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="mb-4">Pengaturan Akun</h5>
                <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Form untuk mengedit profil --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    {{-- Tambahan: Dropdown untuk memilih Role --}}
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="jamaah" {{ $user->role == 'jamaah' ? 'selected' : '' }}>Jamaah</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
