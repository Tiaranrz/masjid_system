@extends('superadmin.layouts.app')

@section('title', 'Detail Masjid')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Detail Masjid</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Nama Masjid:</strong> {{ $masjid->nama_masjid }}
        </div>
        <div class="mb-3">
            <strong>Alamat:</strong> {{ $masjid->alamat }}
        </div>
        <div class="mb-3">
            <strong>Kontak:</strong> {{ $masjid->kontak ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $masjid->email ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Deskripsi:</strong> {{ $masjid->deskripsi ?? '-' }}
        </div>

        <a href="{{ url('superadmin/masjid/'.$masjid->id_masjid.'/edit') }}" class="btn btn-warning">
            <i class="ri-edit-line"></i> Edit
        </a>
        <a href="{{ url('superadmin/masjid') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
