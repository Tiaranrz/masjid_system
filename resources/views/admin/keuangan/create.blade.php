@extends('admin.layouts.app')

@section('title', 'Tambah Transaksi Keuangan')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Input Transaksi Keuangan Baru</h4>
                    </div>
                    <a href="{{ route('admin.keuangan.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <p>Silakan isi detail transaksi (Donasi atau ZISWAF) di bawah.</p>

                    {{-- Form untuk mengirim data --}}
                    <form action="{{ route('admin.keuangan.store') }}" method="POST">
                        @csrf

                        {{-- 1. Jenis Transaksi --}}
                        <div class="form-group">
                            <label for="jenis" class="form-label">Jenis Transaksi:</label>
                            <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                                <option value="" disabled selected>Pilih Jenis</option>
                                <option value="donasi" {{ old('jenis') == 'donasi' ? 'selected' : '' }}>Donasi</option>
                                <option value="ziswaf" {{ old('jenis') == 'ziswaf' ? 'selected' : '' }}>ZISWAF</option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 2. Nama Donatur --}}
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Donatur/Jamaah:</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 3. Jumlah & Tanggal --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah" class="form-label">Jumlah (Rp):</label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" min="1000" required>
                                    @error('jumlah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal" class="form-label">Tanggal Transaksi:</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- 4. Metode Pembayaran --}}
                        <div class="form-group">
                            <label for="metode" class="form-label">Metode Pembayaran:</label>
                            <select class="form-select @error('metode') is-invalid @enderror" id="metode" name="metode">
                                <option value="" disabled selected>Pilih Metode</option>
                                <option value="transfer" {{ old('metode') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                                <option value="cash" {{ old('metode') == 'cash' ? 'selected' : '' }}>Tunai</option>
                                <option value="ewallet" {{ old('metode') == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                            </select>
                            @error('metode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
