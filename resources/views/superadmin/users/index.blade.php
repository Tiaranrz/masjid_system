@extends('superadmin.layouts.app')
@section('title', 'Manajemen User')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">User List</h4>
        <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary">
            <i class="ri-add-line"></i> Add User
        </a>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="min-width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $i => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/avatars/01.png') }}" class="img-fluid rounded-circle avatar-50 me-3" alt="image">
                                    <div>
                                        <p class="mb-0 lh-1">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role == 'superadmin' ? 'bg-primary' : ($user->role == 'admin' ? 'bg-info' : 'bg-secondary') }}">
                                    {{ ucfirst($user->role) ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('superadmin.users.edit', $user->id) }}">
                                        <span class="btn-inner">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4925 2.78906H7.75349C4.67854 2.78906 2.78906 4.88602 2.78906 7.96101V16.2941C2.78906 19.3691 4.67854 21.466 7.75349 21.466H16.0865C19.1615 21.466 21.2585 19.3691 21.2585 16.2941V12.5551" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.88214 10.921L16.3004 3.63001C17.2329 2.74457 18.7107 2.74457 19.6432 3.63001L20.8281 4.75704C21.7605 5.64247 21.7605 7.07921 20.8281 7.96464L13.3158 15.2671L8.88214 15.2671L8.88214 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15.143 4.61905L19.6702 8.91081" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Yakin hapus user ini?')" title="Delete">
                                            <span class="btn-inner">
                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4678 19.0403C18.3378 20.1043 17.7948 21.0863 16.7718 21.5163C15.8208 21.9183 14.8338 22.0573 13.7958 22.0213C10.7608 21.9713 7.99479 21.0183 5.99079 19.3243C5.99079 19.3243 5.21579 14.9123 5.07279 13.2863" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.309 6.42597C17.309 6.42597 18.894 8.707 20.449 10.999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.61765 10.999C5.61765 10.999 7.15465 8.714 8.68865 6.42597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.1554 13.9976H9.45842" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M18.0004 5.99999H21.5C22.0523 5.99999 22.5 6.44771 22.5 6.99999V8.56094C22.5 9.03223 22.114 9.41823 21.6427 9.41823H2.85732C2.3859 9.41823 2 9.03223 2 8.56094V6.99999C2 6.44771 2.44772 5.99999 3 5.99999H6.5M17 5.99999V4.60942C17 3.32475 16.0355 2.29654 14.757 2.18957L14.447 2.16391C13.2041 2.05435 12.015 2.92878 12.015 4.18471V5.99999M17 5.99999H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data user</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="ligth">
                            <th>No</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="min-width: 100px">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
