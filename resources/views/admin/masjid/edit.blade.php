@extends('admin.layouts.app')

@section('title', 'Edit Profil Masjid')

@section('content')
<div class="container mt-4">
    <h3>Edit Profil Masjid</h3>

    <form action="{{ route('admin.masjid.update', $masjid->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_masjid" class="form-label">Nama Masjid</label>
            <input type="text" class="form-control" name="name_masjid"
                   value="{{ old('name_masjid', $masjid->name_masjid) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" required>{{ old('address', $masjid->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="phone"
                   value="{{ old('phone', $masjid->phone) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Masjid</label>
            <input type="email" class="form-control" name="email"
                   value="{{ old('email', $masjid->email) }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.masjid.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
