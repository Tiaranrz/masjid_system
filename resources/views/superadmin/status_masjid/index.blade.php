@extends('superadmin.layouts.app')
@section('title', 'Status Masjid')
@section('content')
    <div class="container-fluid content-inner mt-n5 py-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Status Masjid</h4>
                            </div>
                        </div>
                        <div class="card-body px-0">
               <div class="table-responsive">
                  <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                     <thead>
                        <tr class="ligth">
                           <th>Profile</th>
                           <th>Name</th>
                           <th>Contact</th>
                           <th>Email</th>
                           <th>Country</th>
                           <th>Status</th>
                           <th>Company</th>
                           <th>Join Date</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($masjids as $masjid)
                    <tr>
                    <td class="text-center">
                    <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{ asset($masjid->profile_image) }}" alt="profile">
                    </td>
                <td>
                <div class="data-info">
                    <h6 class="mb-0">{{ $masjid->nama_masjid }}</h6>
                    <p class="mb-0">{{ $masjid->lokasi }}</p>
                </div>
            </td>
            <td>{{ $masjid->contact }}</td>
            <td>{{ $masjid->email }}</td>
            <td>{{ $masjid->country }}</td>
            <td>
                <span class="badge bg-primary">{{ $masjid->status }}</span>
            </td>
            <td>{{ $masjid->company }}</td>
            <td>{{ $masjid->join_date }}</td>
                <td>
                    <div class="flex align-items-center list-user-action">
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="#"><span class="btn-inner">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4925 2.78906H7.75349C4.67854 2.78906 2.78854 4.86906 2.78854 7.94406V16.2091C2.78854 19.2841 4.66849 21.1741 7.74349 21.1741H16.0085C19.0835 21.1741 20.9735 19.2941 20.9735 16.2191V12.4791" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.88379 16.2091L14.9397 10.1532L13.8838 9.10023L7.82379 15.1562L7.75379 17.2091L9.80379 17.1391L15.8568 11.0832L16.9127 12.1391L8.88379 20.1691H16.0088C18.0678 20.1691 19.4648 18.7731 19.4648 16.7141V12.4791" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                            </span>
                                                </a>
                                                    <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#"><span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4618 19.0403C18.3398 20.1043 17.2978 21.0543 16.2238 21.0473C13.7848 21.0473 10.9838 21.0663 8.52585 21.0473C7.46185 21.0543 6.40885 20.0783 6.29785 19.0183C5.97785 16.1813 5.43485 9.46826 5.43485 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.7048 6.23918C20.4568 6.23918 15.1788 6.23918 12.0498 6.23918H3.77485" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.2948 4.72912H10.4548C9.64579 4.72912 8.97479 5.42112 8.97479 6.23012V6.23918H15.0148V6.23012C15.0148 5.42112 14.3298 4.72912 13.5208 4.72912H13.2948Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    </span>
                                                    </a>
                                                </div>
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
    </div>
@endsection
