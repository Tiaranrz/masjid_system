@extends('admin.layouts.app')

@section('title', 'Detail Event')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h4 class="card-title">Detail Kegiatan: {{ $event->title }}</h4>
                        <p class="mb-0 text-muted">Status:
                            <span class="badge bg-{{ $event->status == 'finished' ? 'success' : ($event->status == 'ongoing' ? 'warning' : 'primary') }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </p>
                    </div>
                    <div>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning me-2">
                            <i class="ri-pencil-line"></i> Edit
                        </a>
                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Yakin ingin menghapus event ini?')">
                                <i class="ri-delete-bin-line"></i> Hapus
                            </button>
                        </form>
                        {{-- Tombol Kembali --}}
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-secondary">
                            Kembali ke Jadwal
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="mb-3 text-primary">Informasi Kegiatan</h5>
                    <table class="table table-borderless table-striped mb-4">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Judul</th>
                                <td>{{ $event->title }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal & Waktu</th>
                                <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>
                                    @if($event->location)
                                        {{ $event->location }}
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge bg-{{ $event->status == 'finished' ? 'success' : ($event->status == 'ongoing' ? 'warning' : 'primary') }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @if($event->description)
                    <h5 class="mb-3 text-primary">Deskripsi</h5>
                    <div class="p-3 border rounded bg-light">
                        <p>{{ $event->description }}</p>
                    </div>
                    @endif

                    <h5 class="mb-3 mt-4 text-primary">Detail Sistem</h5>
                    <table class="table table-borderless table-sm text-muted">
                        <tbody>
                            <tr>
                                <th>ID Event</th>
                                <td>#{{ $event->id }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat pada</th>
                                <td>{{ \Carbon\Carbon::parse($event->created_at)->format('d F Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diperbarui</th>
                                <td>{{ \Carbon\Carbon::parse($event->updated_at)->format('d F Y H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
