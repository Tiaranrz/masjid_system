@extends('admin.layouts.app')

@section('title', 'Manajemen Data Jamaah')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-8">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                {{-- Header Card --}}
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title">Data Jamaah Masjid</h4>
                        </div>
                        <div class="col-md-6 text-md-end">
                           {{-- Tombol Tambah Jamaah --}}
                           <a href="{{ route('admin.jamaah.create') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                            <i class="btn-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </i>
                            <span>Tambah Jamaah</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Body Card (Tabel Data) --}}
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table id="jamaah-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                            <thead>
                                <tr class="ligth">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tgl Bergabung</th>
                                    <th>Masjid</th>
                                    <th style="min-width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Looping data jamaah dari controller --}}
                                @foreach ($jamaahs as $key => $jamaah)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jamaah->full_name }}</td>
                                        <td>{{ $jamaah->email }}</td>
                                        <td>{{ $jamaah->phone_number }}</td>

                                        {{-- Asumsi ada relasi gender --}}
                                        <td>{{ $jamaah->gender->name ?? '-' }}</td>

                                        <td>{{ \Carbon\Carbon::parse($jamaah->join_date)->format('d F Y') }}</td>

                                        {{-- Asumsi ada relasi masjid --}}
                                        <td>{{ $jamaah->masjid->name ?? '-' }}</td>

                                        {{-- Kolom Action --}}
                                        <td>
                                            {{-- Tombol Edit --}}
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip"
                                                href="{{ route('admin.jamaah.edit', $jamaah->id_jamaah) }}" aria-label="Edit Jamaah" data-bs-original-title="Edit Jamaah">
                                                <span class="btn-inner">
                                                {{-- SVG for Edit Icon --}}
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            </a>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('admin.jamaah.destroy', $jamaah->id_jamaah) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-icon text-danger flex-end" data-bs-toggle="tooltip" aria-label="Hapus Jamaah" data-bs-original-title="Hapus Jamaah" onclick="return confirm('Hapus data jamaah ini?')">
                                                <span class="btn-inner">
                                                    {{-- SVG for Delete Icon --}}
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
        </div>
    </div>
</div>
@endsection
