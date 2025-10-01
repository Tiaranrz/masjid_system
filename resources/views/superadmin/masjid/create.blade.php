@extends('superadmin.layouts.app')

@section('title', 'Tambah Masjid')

@section('content')

<div class="container-fluid">
<div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
<h4 class="card-title">Tambah Masjid</h4>
<a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<i class="btn-inner">
</i>
<span>Kembali</span>
</a>
</div>
<div class="card-body">
<form action="{{ route('superadmin.masjid.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-md-6 mb-3">
<label class="form-label">Nama Masjid</label>
<input type="text" name="name" class="form-control" required>
</div>
<div class="col-md-6 mb-3">
<label class="form-label">Slug</label>
<input type="text" name="slug" class="form-control">
</div>
</div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="address" class="form-control" rows="2" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kontak Person</label>
                    <input type="text" name="contact_person" class="form-control" placeholder="08xxxxxxx">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="-6.200000">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="106.816666">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="text-center btn btn-primary btn-icon me-2">
                    <i class="btn-inner">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3262 2.75024H7.67425C4.67025 2.75024 2.75025 4.90024 2.75025 7.89624V16.1052C2.75025 19.1022 4.67025 21.2512 7.67425 21.2512H16.3262C19.3292 21.2512 21.2502 19.1022 21.2502 16.1052V7.89624C21.2502 4.90024 19.3292 2.75024 16.3262 2.75024ZM15.4242 10.9663C15.6302 10.7083 15.6022 10.3343 15.3442 10.1283L12.5642 7.89624C12.3062 7.69024 11.9322 7.71824 11.7262 7.97624C11.5202 8.23424 11.5482 8.60824 11.8062 8.81424L13.8822 10.4572L11.8062 12.1002C11.5482 12.3062 11.5202 12.6802 11.7262 12.9382C11.9322 13.1962 12.3062 13.2242 12.5642 13.0182L15.3442 10.7862C15.6022 10.5802 15.6302 10.2062 15.4242 9.94824Z" fill="currentColor"></path>
                        </svg>
                    </i>
                    <span>Simpan</span>
                </button>
                <a href="{{ route('superadmin.masjid.index') }}" class="text-center btn btn-secondary btn-icon">
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
