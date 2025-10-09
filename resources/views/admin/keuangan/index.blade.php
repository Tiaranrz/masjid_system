@extends('admin.layouts.app')

@section('title', 'Manajemen Keuangan')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h4>Manajemen Keuangan {{ $jenis ? ' (' . ucfirst($jenis) . ')' : '' }}</h4>

            <div class="d-flex align-items-center">
                {{-- Tombol Tambah Transaksi --}}
                <a href="{{ route('admin.keuangan.create') }}" class="btn btn-success me-3">
                    <i class="ri-add-line me-1"></i> Tambah Transaksi
                </a>

                {{-- Dropdown untuk filter jenis transaksi --}}
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter: {{ $jenis ? ucfirst($jenis) : 'Semua Transaksi' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.keuangan.index') }}">Semua Transaksi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.keuangan.index', ['jenis' => 'donasi']) }}">Donasi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.keuangan.index', ['jenis' => 'ziswaf']) }}">ZISWAF</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel transaksi --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="keuangan-table">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Nama Donatur</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Metode</th>
                                    <th>Status</th>
                                    <th style="min-width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksis as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->jenis == 'donasi' ? 'success' : 'info' }}">
                                            {{ ucfirst($item->jenis) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->metode }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->status == 'sukses' ? 'success' : ($item->status == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- Detail --}}
                                        <a href="{{ route('admin.keuangan.show', $item->id) }}" class="btn btn-sm btn-info btn-icon" data-bs-toggle="tooltip" title="Detail">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.keuangan.edit', $item->id) }}" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" title="Edit">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.keuangan.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-icon" onclick="return confirm('Yakin ingin menghapus transaksi ini?')" data-bs-toggle="tooltip" title="Hapus">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada transaksi {{ $jenis ? ucfirst($jenis) : '' }} yang tercatat.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Catatan: Pagination dihilangkan karena Controller menggunakan ->get() bukan ->paginate() --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
