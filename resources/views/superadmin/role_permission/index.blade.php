@extends('superadmin.layouts.app') {{-- Pastikan ini sesuai dengan nama layout utama Anda --}}

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-lg rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 fw-bold">Role & Permission</h4>
                <p class="text-muted small mb-0">Kelola Role dan Permission untuk user Superadmin</p>
            </div>
            <div>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#permissionModal">+ New Permission</button>
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#roleModal">+ New Role</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Permission</th>
                            @foreach ($roles as $role)
                                <th>
                                    <span class="d-inline-flex align-items-center">
                                        {{ ucfirst($role->name) }}
                                        <a href="{{ route('superadmin.roles.edit', $role->id) }}" class="ms-2 text-info">
                                            <i class="ri-pencil-line"></i>
                                        </a>
                                        <form action="{{ route('superadmin.roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm text-danger p-0 ms-1" onclick="return confirm('Yakin ingin menghapus role ini?')">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </form>
                                    </span>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                            <td class="text-start fw-bold">
                                <div class="d-flex align-items-center">
                                    {{ $permission->name }}
                                    <a href="{{ route('superadmin.permissions.edit', $permission->id) }}" class="ms-2 text-info">
                                        <i class="ri-pencil-line"></i>
                                    </a>
                                    <form action="{{ route('superadmin.permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger p-0 ms-1" onclick="return confirm('Yakin ingin menghapus permission ini?')">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @foreach ($roles as $role)
                            <td>
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="role_permission_status"
                                    value="{{ $role->id . '-' . $permission->id }}"
                                    {{ $role->hasPermission($permission->name) ? 'checked' : '' }}
                                    data-role-id="{{ $role->id }}"
                                    data-permission-id="{{ $permission->id }}"
                                >
                            </td>
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ count($roles) + 1 }}" class="text-center">Tidak ada data permission.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="roleModalLabel">Tambah Role Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('superadmin.roles.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="roleName" name="name" placeholder="Contoh: Admin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="permissionModalLabel">Tambah Permission Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('superadmin.permissions.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="permissionName" class="form-label">Nama Permission</label>
                        <input type="text" class="form-control" id="permissionName" name="name" placeholder="Contoh: Edit Masjid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
