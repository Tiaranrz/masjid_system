@extends('superadmin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="row">
  <div class="col-lg-8 mx-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit User</h4>
        <a href="{{ route('superadmin.users.index') }}" class="btn btn-sm btn-secondary">
          <i class="ri-arrow-go-back-line"></i> Back
        </a>
      </div>

      <div class="card-body">
        {{-- Pesan Error --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Form Edit --}}
        <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name', $user->name) }}" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', $user->email) }}" required>
          </div>

          <div class="mb-3">
            <label for="phone_number" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"
                   value="{{ old('phone_number', $user->phone_number) }}">
          </div>

          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
              <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
              <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin Masjid</option>
              <option value="jamaah" {{ old('role', $user->role) == 'jamaah' ? 'selected' : '' }}>Jamaah</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password (kosongkan jika tidak diubah)</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success">
              <i class="ri-save-line"></i> Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
