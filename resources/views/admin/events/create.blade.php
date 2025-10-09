@extends('admin.layouts.app')

@section('title', 'Tambah Event Baru')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Form Tambah Event/Kegiatan Masjid</h4>
                    </div>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali ke Jadwal</a>
                </div>
                <div class="card-body">
                    <p>Silakan lengkapi informasi kegiatan yang akan dilaksanakan.</p>

                    {{-- Form untuk mengirim data --}}
                    <form action="{{ route('admin.events.store') }}" method="POST">
                        @csrf

                        {{-- 1. Judul Event --}}
                        <div class="form-group">
                            <label for="title" class="form-label">Judul Kegiatan/Event:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required maxlength="150">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 2. Tanggal & Waktu Event --}}
                        <div class="form-group">
                            <label for="event_date" class="form-label">Tanggal & Waktu Event:</label>
                            <input type="datetime-local" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
                            @error('event_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 3. Lokasi --}}
                        <div class="form-group">
                            <label for="location" class="form-label">Lokasi Kegiatan:</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="Contoh: Ruang Utama Masjid" maxlength="255">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 4. Status --}}
                        <div class="form-group">
                            <label for="status" class="form-label">Status Event:</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming (Akan Datang)</option>
                                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing (Sedang Berlangsung)</option>
                                <option value="finished" {{ old('status') == 'finished' ? 'selected' : '' }}>Finished (Selesai)</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 5. Deskripsi --}}
                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi Kegiatan:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Deskripsi detail tentang kegiatan...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line me-1"></i> Simpan Event
                            </button>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                                <i class="ri-arrow-left-line me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
