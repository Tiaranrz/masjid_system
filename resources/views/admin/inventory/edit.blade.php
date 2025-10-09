@extends('admin.layouts.app')

@section('title', 'Edit Aset Inventaris')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Form Edit Aset Inventaris</h4>
                    </div>
                    <a href="{{ route('admin.inventory.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <p>Ubah detail aset inventaris masjid.</p>

                    {{-- Form untuk mengirim data ke rute admin.inventory.update --}}
                    {{-- Pastikan variabel $inventory di-pass dari controller --}}
                    <form action="{{ route('admin.inventory.update', $inventory->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Digunakan untuk memicu metode update di Controller --}}

                        {{-- 1. Nama Asset --}}
                        <div class="form-group">
                            <label for="asset_name" class="form-label">Nama Asset:</label>
                            <input type="text" class="form-control @error('asset_name') is-invalid @enderror" id="asset_name" name="asset_name"
                                value="{{ old('asset_name', $inventory->asset_name) }}" required>
                            @error('asset_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 2. Kategori Asset --}}
                        <div class="form-group">
                            <label for="category" class="form-label">Kategori:</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="" disabled>Pilih Kategori</option>
                                {{-- Menggunakan helper 'old()' atau nilai dari $inventory --}}
                                @php $currentCategory = old('category', $inventory->category); @endphp
                                <option value="Perlengkapan Ibadah" {{ $currentCategory == 'Perlengkapan Ibadah' ? 'selected' : '' }}>Perlengkapan Ibadah</option>
                                <option value="Elektronik" {{ $currentCategory == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                <option value="Perabotan" {{ $currentCategory == 'Perabotan' ? 'selected' : '' }}>Perabotan</option>
                                <option value="Bangunan/Fisik" {{ $currentCategory == 'Bangunan/Fisik' ? 'selected' : '' }}>Bangunan/Fisik</option>
                                <option value="Lainnya" {{ $currentCategory == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 3. Satuan --}}
                        <div class="form-group">
                            <label for="unit" class="form-label">Satuan:</label>
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit"
                                value="{{ old('unit', $inventory->unit) }}" placeholder="Contoh: Buah, Unit, Set, Meter" required>
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 4. Harga Asset --}}
                        <div class="form-group">
                            <label for="asset_price" class="form-label">Harga Asset (Rp):</label>
                            <input type="number" class="form-control @error('asset_price') is-invalid @enderror" id="asset_price" name="asset_price"
                                value="{{ old('asset_price', $inventory->asset_price) }}" min="0" required>
                            @error('asset_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 5. Kondisi Asset --}}
                        <div class="form-group">
                            <label for="condition" class="form-label">Kondisi Asset:</label>
                            <select class="form-select @error('condition') is-invalid @enderror" id="condition" name="condition" required>
                                <option value="" disabled>Pilih Kondisi</option>
                                @php $currentCondition = old('condition', $inventory->condition); @endphp
                                <option value="Baik" {{ $currentCondition == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ $currentCondition == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ $currentCondition == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                            @error('condition')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 6. Status Asset --}}
                        <div class="form-group">
                            <label for="status" class="form-label">Status Asset:</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="" disabled>Pilih Status</option>
                                @php $currentStatus = old('status', $inventory->status); @endphp
                                <option value="Tersedia" {{ $currentStatus == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Dipinjam" {{ $currentStatus == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Dalam Perbaikan" {{ $currentStatus == 'Dalam Perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                                <option value="Dihapus" {{ $currentStatus == 'Dihapus' ? 'selected' : '' }}>Dihapus</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Perbarui Aset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
