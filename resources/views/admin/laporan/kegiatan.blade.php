@extends('admin.layouts.app')

@section('title', 'Laporan Kegiatan')
@section('title_header', 'Laporan Event & Kajian Masjid')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title">Daftar Kegiatan dan Event Masjid</h4>
                    <p class="mb-0 text-muted">Periode: {{ \Carbon\Carbon::parse($dateFrom)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($dateTo)->format('d M Y') }}</p>
                    <h6 class="mt-2 text-primary">Total Kegiatan Ditemukan: {{ $totalEvents }}</h6>
                </div>

                {{-- Form Filter Periode (Date Range Picker) --}}
                <div class="d-flex align-items-center">
                    {{-- Anda bisa menggunakan pustaka seperti Flatpickr untuk input tanggal yang lebih baik --}}
                    <form method="GET" action="{{ route('admin.laporan.index') }}" class="d-flex gap-2">
                        <input type="date" name="from" class="form-control form-control-sm" value="{{ $dateFrom }}" placeholder="Dari Tanggal">
                        <input type="date" name="to" class="form-control form-control-sm" value="{{ $dateTo }}" placeholder="Sampai Tanggal">
                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kegiatan</th>
                                <th>Kategori</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Penanggung Jawab</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td><span class="badge bg-secondary">{{ $event->category ?? 'Umum' }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}</td>
                                <td>{{ $event->pic }}</td>
                                <td>
                                    <span class="badge bg-{{ $event->status === 'Selesai' ? 'success' : ($event->status === 'Dibatalkan' ? 'danger' : 'primary') }}">
                                        {{ strtoupper($event->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data kegiatan dalam periode ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
