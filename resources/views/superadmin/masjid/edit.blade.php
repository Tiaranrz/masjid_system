@extends('superadmin.layouts.app')

@section('title', 'Edit Masjid')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Edit Masjid</h4>
    </div>
    <div class="card-body">
       <form action="{{ url('superadmin/masjid/' . $masjid->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Masjid</label>
                <input type="text" name="nama_masjid" value="{{ $masjid->nama_masjid }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $masjid->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak" value="{{ $masjid->kontak }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $masjid->email }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $masjid->deskripsi }}</textarea>
            </div>

           <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('superadmin.masjid.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
