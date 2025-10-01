@extends('admin.layouts.app')

@section('title', 'Manajemen Event')

@section('title_header', 'Daftar Kegiatan Masjid')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title">Jadwal Event dan Kegiatan</h4>
                    <p class="mb-0 text-muted">Lihat semua kegiatan dalam bentuk linimasa.</p>
                </div>

                {{-- Tombol Tambah Event (CRUD Create) --}}
                <div class="header-action">
                    <a href="{{ route('admin.event.create') }}" class="btn btn-primary">
                        <i class="ri-add-line me-1"></i> Tambah Event Baru
                    </a>
                </div>
            </div>

            <div class="card-body">

                {{-- Notifikasi Sukses/Error --}}
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Timeline Structure --}}
                <div class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                    <ul class="list-inline p-0 m-0 w-100">
                        @forelse ($events as $event)
                        <li data-aos="fade-up">
                            {{-- Time Block (Menggunakan warna berdasarkan status/selesai) --}}
                            <div class="time bg-{{ $event->is_finished ? 'success' : 'primary' }}">
                                <span>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</span>
                            </div>

                            {{-- Content Block --}}
                            <div class="content">
                                <div class="timeline-dots new-timeline-dots border-{{ $event->is_finished ? 'success' : 'primary' }}"></div>
                                <h6 class="mb-1">{{ $event->title }}</h6>
                                <div class="d-inline-block w-100">
                                    <p class="mb-2">
                                        <i class="ri-time-line me-1"></i>
                                        Waktu: {{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('H:i') }}
                                    </p>
                                    <p class="mb-2">
                                        <i class="ri-map-pin-line me-1"></i>
                                        Lokasi: {{ $event->location }}
                                    </p>
                                    <p>{{ $event->description }}</p>

                                    {{-- CRUD Aksi --}}
                                    <div class="d-flex gap-2 mt-3">
                                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-sm btn-warning">
                                            <i class="ri-pencil-line"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus event ini?')">
                                                <i class="ri-delete-bin-line"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <div class="alert alert-info text-center mt-3">
                            Belum ada kegiatan yang tercatat. Silakan tambahkan kegiatan baru!
                        </div>
                        @endforelse
                    </ul>
                </div>
                {{-- End Timeline --}}
            </div>
        </div>
    </div>
</div>
@endsection
