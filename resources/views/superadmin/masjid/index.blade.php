@extends('superadmin.layouts.app')

@section('title', 'Manajemen Masjid')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Daftar Masjid</h4>
        <a href="{{ url('superadmin/masjid/create') }}" class="btn btn-primary">
            <i class="ri-add-line"></i> Tambah Masjid
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Masjid</th>
                        <th>Alamat</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($masjids as $key => $masjid)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md bg-primary text-white rounded-circle me-3">
                                        {{ strtoupper(substr($masjid->nama_masjid, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $masjid->nama_masjid }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $masjid->alamat }}</td>
                            <td>{{ $masjid->kontak ?? '-' }}</td>
                            <td>{{ $masjid->email ?? '-' }}</td>
                            <td>{{ Str::limit($masjid->deskripsi, 30) }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ url('superadmin/masjid/'.$masjid->id_masjid) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="ri-eye-line"></i> Detail
                                </a>
                                <a href="{{ url('superadmin/masjid/'.$masjid->id_masjid.'/edit') }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                                <form action="{{ url('superadmin/masjid/'.$masjid->id_masjid) }}"
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Yakin hapus data masjid ini?')"
                                            class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-6-line"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data masjid</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
    {{-- Peta Lokasi Masjid --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Peta Lokasi Masjid</h5>
        </div>
        <div class="card-body">
            <div id="map" style="height:400px;"></div>
        </div>
    </div>
</div>

{{-- Leaflet.js --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi peta
        var map = L.map('map').setView([-2.5, 118], 5); // Pusat Indonesia

        // Layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk tiap masjid
        @foreach($masjids as $masjid)
            @if($masjid->latitude && $masjid->longitude)
                L.marker([{{ $masjid->latitude }}, {{ $masjid->longitude }}])
                    .addTo(map)
                    .bindPopup("<b>{{ $masjid->nama_masjid }}</b><br>{{ $masjid->alamat }}");
            @endif
        @endforeach
    });
</script>
@endsection

