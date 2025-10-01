@extends('layouts.app') {{-- ganti sesuai layout utama Anda --}}

@section('title', 'Daftar Jamaah')

@section('content')
<div class="container mt-4">
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Manajemen Jamaah</h1>

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Jamaah</h5>
                    <p class="card-text fs-4">{{ $totalJamaah }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Jamaah Aktif</h5>
                    <p class="card-text fs-4">{{ $totalJamaahAktif }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol tambah --}}
    <div class="mb-3">
        <a href="{{ route('admin.jamaah.create') }}" class="btn btn-primary">
            + Tambah Jamaah
        </a>
    </div>

    {{-- Tabel daftar jamaah --}}
    <div class="card">
        <div class="card-header">
            Daftar Jamaah
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jamaah as $index => $j)
                        <tr>
                            <td>{{ $loop->iteration + ($jamaah->currentPage() - 1) * $jamaah->perPage() }}</td>
                            <td>{{ $j->nama }}</td>
                            <td>{{ $j->alamat ?? '-' }}</td>
                            <td>{{ $j->no_hp ?? '-' }}</td>
                            <td>
                                @if($j->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($j->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.jamaah.edit', $j->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.jamaah.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data jamaah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $jamaah->links() }}
    </div>
</div>
@endsection
