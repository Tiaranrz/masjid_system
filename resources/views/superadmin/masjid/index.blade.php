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
                            {{-- Info Tenant Aktif --}}
                            @php
                                $currentTenant = session('current_tenant_id', 'masjid1');
                                $tenantNames = [
                                    'masjid1' => 'Masjid Al-Ikhlas',
                                    'masjid2' => 'Masjid An-Nur'
                                ];
                                $currentName = $tenantNames[$currentTenant] ?? $currentTenant;
                            @endphp
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Sedang aktif: <strong>{{ $currentName }}</strong>
                            </small>
                        </div>
                        <div class="col-md-6 text-md-end">
                            {{-- Tenant Switcher --}}
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    🕌 Switch Masjid
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($tenantNames as $id => $name)
                                        <li>
                                            <a class="dropdown-item {{ $currentTenant == $id ? 'active' : '' }}"
                                               href="{{ route('tenant.switch', $id) }}">
                                                {{ $name }}
                                                @if($currentTenant == $id)
                                                    <i class="fas fa-check float-end mt-1"></i>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Tombol Tambah Masjid --}}
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

                {{-- Alert Info Tenant Aktif --}}
                @if(session('current_tenant_id'))
                <div class="alert alert-info mx-3 mt-3 mb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-mosque me-2"></i>
                            <strong>Mode Tenant Aktif:</strong>
                            {{ $currentName }}
                            <span class="badge bg-primary ms-2">{{ $currentTenant }}</span>
                        </div>
                        <div>
                            <small>
                                Data yang ditampilkan dan dikelola hanya untuk masjid ini
                            </small>
                        </div>
                    </div>
                </div>
                @endif

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
                                    <tr class="{{ $masjid->id == $currentTenant ? 'table-active' : '' }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $masjid->name }}
                                            @if($masjid->id == $currentTenant)
                                                <span class="badge bg-success ms-1">Aktif</span>
                                            @endif
                                        </td>
                                        <td>{{ $masjid->slug }}</td>
                                        <td>{{ $masjid->address }}</td>
                                        <td>{{ $masjid->contact_person }}</td>
                                        <td>{{ $masjid->phone }}</td>
                                        <td>{{ $masjid->email }}</td>
                                        <td>{{ Str::limit($masjid->description, 50) }}</td>
                                        <td>
                                            @if ($masjid->status == 'active')
                                                <span class="badge bg-success">{{ $masjid->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $masjid->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Tombol Switch Tenant --}}
                                            @if($masjid->id != $currentTenant)
                                                <a href="{{ route('tenant.switch', $masjid->id) }}"
                                                   class="btn btn-sm btn-outline-primary mb-1"
                                                   data-bs-toggle="tooltip"
                                                   title="Switch ke {{ $masjid->name }}">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-sm btn-success mb-1" disabled
                                                        data-bs-toggle="tooltip"
                                                        title="Sedang aktif">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                            {{-- Tombol Edit --}}
                                            <a class="btn btn-sm btn-icon text-primary flex-end mb-1"
                                               data-bs-toggle="tooltip"
                                               href="{{ route('superadmin.masjid.edit', $masjid->id) }}"
                                               aria-label="Edit Masjid"
                                               data-bs-original-title="Edit Masjid">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('superadmin.masjid.destroy', $masjid->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-icon text-danger flex-end mb-1"
                                                        data-bs-toggle="tooltip"
                                                        aria-label="Hapus Masjid"
                                                        data-bs-original-title="Hapus Masjid"
                                                        onclick="return confirm('Hapus Masjid ini?')">
                                                    <span class="btn-inner">
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

            {{-- Peta Lokasi Masjid --}}
            <div class="card mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Peta Lokasi Masjid</h5>
                        <small class="text-muted">
                            Tenant aktif: <strong>{{ $currentName }}</strong>
                        </small>
                    </div>
                </div>
                <div class="card-body">
                    <div id="map" style="height:400px;"></div>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-0">{{ count($masjids) }}</h4>
                                    <p class="mb-0">Total Masjid</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-mosque fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-0">{{ $masjids->where('status', 'active')->count() }}</h4>
                                    <p class="mb-0">Masjid Aktif</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-0">{{ $currentName }}</h4>
                                    <p class="mb-0">Sedang Aktif</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>

<style>
.table-active {
    background-color: #e3f2fd !important;
    font-weight: bold;
}
</style>
@endsection
