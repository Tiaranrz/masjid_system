@extends('admin.layouts.app')

@section('title', 'Detail Aset Inventaris')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detail Aset: {{ $inventory->asset_name }}</h4>
                    </div>
                    <div>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.inventory.edit', $inventory->id) }}" class="btn btn-sm btn-primary me-2">
                            <i class="ri-edit-line"></i> Edit
                        </a>
                        {{-- Tombol Kembali --}}
                        <a href="{{ route('admin.inventory.index') }}" class="btn btn-sm btn-secondary">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Nama Asset --}}
                            <h6 class="text-primary">Nama Aset</h6>
                            <p class="mb-4">{{ $inventory->asset_name }}</p>

                            {{-- Kategori --}}
                            <h6 class="text-primary">Kategori</h6>
                            <p class="mb-4">{{ $inventory->category }}</p>

                            {{-- Satuan --}}
                            <h6 class="text-primary">Satuan</h6>
                            <p class="mb-4">{{ $inventory->unit }}</p>
                        </div>

                        <div class="col-md-6">
                            {{-- Harga Asset --}}
                            <h6 class="text-primary">Harga Aset</h6>
                            <p class="mb-4">Rp{{ number_format($inventory->asset_price, 0, ',', '.') }}</p>

                            {{-- Kondisi --}}
                            <h6 class="text-primary">Kondisi</h6>
                            <p class="mb-4">
                                @if ($inventory->condition == 'Baik')
                                    <span class="badge bg-success">{{ $inventory->condition }}</span>
                                @elseif ($inventory->condition == 'Rusak Ringan')
                                    <span class="badge bg-warning">{{ $inventory->condition }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $inventory->condition }}</span>
                                @endif
                            </p>

                            {{-- Status --}}
                            <h6 class="text-primary">Status</h6>
                            <p class="mb-4">
                                @if ($inventory->status == 'Tersedia')
                                    <span class="badge bg-success">{{ $inventory->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $inventory->status }}</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <hr>

                    {{-- Detail Waktu Pembuatan/Update --}}
                    <div class="row mt-4 text-muted small">
                        <div class="col-md-6">
                            <p><strong>Dibuat pada:</strong> {{ $inventory->created_at->format('d F Y H:i') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Terakhir Diperbarui:</strong> {{ $inventory->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    {{-- Anda bisa menambahkan form Hapus di sini juga --}}
                    <div class="mt-4 pt-3 border-top">
                        <form action="{{ route('admin.inventory.destroy', $inventory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aset ini?')">
                                Hapus Aset
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
