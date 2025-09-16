@extends('admin.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">🔐 Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">← Kembali ke Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
