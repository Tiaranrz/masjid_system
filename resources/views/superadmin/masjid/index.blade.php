@extends('superadmin.layouts.app')

@section('title', 'Manajemen Tenant')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4 class="card-title">Data Masjid</h4>
        </div>
        <div class="col-md-6 text-md-end"> {{-- Gunakan text-end atau text-right untuk memposisikan tombol --}}
           <a href="{{ url('superadmin/masjid/create') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
            <i class="btn-inner">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </i>
        <span>Tambah Masjid</span>
        </a>
        </div>
    </div>
</div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Address</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th style="min-width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masjids as $key => $masjid)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $masjid->name }}</td>
                                        <td>{{ $masjid->slug }}</td>
                                        <td>{{ $masjid->address }}</td>
                                        <td>{{ $masjid->contact_person }}</td>
                                        <td>{{ $masjid->phone }}</td>
                                        <td>{{ $masjid->email }}</td>
                                        <td>{{ Str::limit($masjid->description, 50) }}</td> {{-- Perbaikan: Panggil Str::limit langsung --}}
                                        <td>
                                            @if ($masjid->status == 'active')
                                                <span class="badge bg-success">{{ $masjid->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $masjid->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                             <a class="btn btn-sm btn-icon text-primary flex-end"data-bs-toggle="tooltip"
                                             href="{{ route('superadmin.masjid.edit', $masjid->id) }}"aria-label="Edit Masjid"data-bs-original-title="Edit Masjid">
                                        <span class="btn-inner">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </a>
                            <form action="{{ route('superadmin.masjid.destroy', $masjid->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-icon text-danger flex-end"data-bs-toggle="tooltip"aria-label="Hapus Masjid"data-bs-original-title="Hapus Masjid"onclick="return confirm('Hapus Masjid ini?')">
                            <span class="btn-inner">
                {{-- SVG untuk ikon hapus --}}
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4618 19.0403C18.3378 20.1063 17.7608 21.0113 16.6888 21.0403C15.4038 21.0713 14.1238 21.0713 12.8428 21.0713C11.5558 21.0713 10.2758 21.0713 8.99181 21.0403C7.92081 21.0113 7.34381 20.1063 7.21981 19.0403C6.89981 16.2033 6.35681 9.46826 6.35681 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M20.916 6.27637H3.08594" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.5982 17.5106L10.5982 12.7212" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M13.4021 17.5106L13.4021 12.7212" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M18.8821 6.27639V6.27639C18.2261 6.27639 17.6701 6.00639 17.2051 5.51039L16.2411 4.54639C15.8671 4.17239 15.2891 3.96239 14.6941 3.96239H9.30906C8.71406 3.96239 8.13606 4.17239 7.76206 4.54639L6.79806 5.51039C6.33306 6.00639 5.77706 6.27639 5.12106 6.27639V6.27639" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>
            </form>
        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<div class="card mt-4"> {{-- Tambah margin atas --}}
    <div class="card-header">
        <h5 class="mb-0">Peta Lokasi Masjid</h5>
    </div>
    <div class="card-body">
        <div id="map" style="height:400px;"></div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([-2.5, 118], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        @foreach($masjids as $masjid)
            @if($masjid->latitude && $masjid->longitude)
                L.marker([{{ $masjid->latitude }}, {{ $masjid->longitude }}])
                    .addTo(map)
                    .bindPopup("<b>{{ $masjid->name }}</b><br>{{ $masjid->address }}");
            @endif
        @endforeach
    });
</script>
@endsection
