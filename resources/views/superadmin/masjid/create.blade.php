@extends('superadmin.layouts.app')

@section('title', 'Tambah Masjid')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Tambah Masjid</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('superadmin/masjid') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Masjid</label>
                <input type="text" name="nama_masjid" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi (Opsional)</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Contoh: Dekat Alun-Alun Kota">
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


            <button type="submit" class="btn btn-success">
                <i class="ri-save-line"></i> Simpan
            </button>
            <a href="{{ url('superadmin/masjid') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
