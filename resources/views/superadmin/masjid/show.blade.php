@extends('superadmin.layouts.app')

@section('title', 'Detail Tenant')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4 class="card-title mb-0">Detail Tenant</h4>
      <a href="{{ route('superadmin.masjid.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left me-1"></i> Kembali
      </a>
    </div>
    <div class="card-body">
      <div class="mb-3">
        <strong>Nama Masjid:</strong> {{ $masjid->nama }}
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
      <div class="mb-3">
        <strong>Lokasi:</strong> {{ $masjid->lokasi ?? '-' }}
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <strong>Latitude:</strong> {{ $masjid->latitude ?? '-' }}
        </div>
        <div class="col-md-6 mb-3">
          <strong>Longitude:</strong> {{ $masjid->longitude ?? '-' }}
        </div>
      </div>

      <a href="{{ route('superadmin.masjid.edit', $masjid->id) }}" class="btn btn-warning">
        <i class="fa fa-edit me-1"></i> Edit
      </a>
    </div>
  </div>
</div>
@endsection
