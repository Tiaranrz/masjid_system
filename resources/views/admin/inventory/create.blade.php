@extends('admin.layouts.app')

@section('title', 'Tambah Aset Baru')

@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Aset Baru</h4>
                    <p class="mb-0">Silakan isi detail aset inventaris masjid.</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.inventory.store') }}" method="POST">
                        @csrf

                        {{-- Nama Asset --}}
                        <div class="form-group">
                            <label for="asset_name">Nama Asset</label>
                            <input type="text" class="form-control @error('asset_name') is-invalid @enderror"
                                   id="asset_name" name="asset_name" value="{{ old('asset_name') }}" required>
                            @error('asset_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control @error('category') is-invalid @enderror"
                                    id="category" name="category" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Perlengkapan Ibadah" {{ old('category') == 'Perlengkapan Ibadah' ? 'selected' : '' }}>
                                    Perlengkapan Ibadah
                                </option>
                                <option value="Perlengkapan Kebersihan" {{ old('category') == 'Perlengkapan Kebersihan' ? 'selected' : '' }}>
                                    Perlengkapan Kebersihan
                                </option>
                                <option value="Elektronik" {{ old('category') == 'Elektronik' ? 'selected' : '' }}>
                                    Elektronik
                                </option>
                                <option value="Furniture" {{ old('category') == 'Furniture' ? 'selected' : '' }}>
                                    Furniture
                                </option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Satuan --}}
                        <div class="form-group">
                            <label for="unit">Satuan</label>
                            <input type="number" class="form-control @error('unit') is-invalid @enderror"
                                   id="unit" name="unit" value="{{ old('unit') }}" required>
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Harga Asset --}}
                        <div class="form-group">
                            <label for="asset_price">Harga Asset (Rp)</label>
                            <input type="number" class="form-control @error('asset_price') is-invalid @enderror"
                                   id="asset_price" name="asset_price" value="{{ old('asset_price') }}" required>
                            @error('asset_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Kondisi Asset --}}
                        <div class="form-group">
                            <label for="condition">Kondisi Asset</label>
                            <select class="form-control @error('condition') is-invalid @enderror"
                                    id="condition" name="condition" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik" {{ old('condition') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('condition') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('condition') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status Asset --}}
                        <div class="form-group">
                            <label for="status">Status Asset</label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Rusak" {{ old('status') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Dalam Perbaikan" {{ old('status') == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Aset</button>
                            <a href="{{ route('admin.inventory.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
