@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="container-fluid content-inner mt-n5 py-8">
    <div class="row">
        {{-- Header dengan Tombol Aksi --}}
        <div class="col-lg-12 d-flex justify-content-between align-items-center mb-3">
            <h4>Detail Transaksi</h4>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.keuangan.edit', $transaksi->id) }}" class="btn btn-sm btn-warning">
                    <i class="ri-edit-line me-1"></i> Edit
                </a>
                <form action="{{ route('admin.keuangan.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                        <i class="ri-delete-bin-line me-1"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('admin.keuangan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    {{-- Detail Informasi Transaksi --}}
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Transaksi</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>ID Transaksi</th>
                            <td>#{{ $transaksi->id }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Transaksi</th>
                            <td>
                                <span class="badge bg-{{ $transaksi->jenis == 'donasi' ? 'success' : 'info' }}">
                                    {{ ucfirst($transaksi->jenis) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Donatur</th>
                            <td>{{ $transaksi->name_donatur }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>
                                @if($transaksi->metode_pembayaran)
                                    <span class="badge bg-primary">{{ ucfirst($transaksi->metode_pembayaran) }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diupdate Pada</th>
                            <td>{{ \Carbon\Carbon::parse($transaksi->updated_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
