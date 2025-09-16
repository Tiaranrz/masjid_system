@extends('superadmin.layouts.app')
@section('title', 'Tambah Pengguna')
@section('content')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Pengguna Baru</h4>
                        <p class="mb-0">Isi formulir di bawah untuk menambahkan pengguna baru</p>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-soft-primary">
                                        <h5 class="card-title">Informasi Pribadi</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <div class="profile-img-edit position-relative d-inline-block mx-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('../../assets/images/avatars/01.png');"></div>
                                                    </div>
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload" class="bg-primary">
                                                            <svg width="14" height="14" viewBox="0 0 24 24">
                                                                <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                            </svg>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="fname">No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="fname" placeholder="Nama depan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="lname">User Name</label>
                                                <input type="text" class="form-control" id="lname" placeholder="Nama belakang">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="email@contoh.com">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="phone">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="phone" placeholder="08xxxxxxxxxx">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="address">Alamat</label>
                                            <textarea class="form-control" id="address" rows="2" placeholder="Alamat lengkap"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-soft-primary">
                                        <h5 class="card-title">Role & Keamanan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Peran Pengguna <span class="text-danger">*</span></label>
                                            <select class="form-select" id="user-role">
                                                <option value="">Pilih Peran</option>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="admin_eo">Admin Masjid</option>
                                                <option value="client">Jamaah</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="username" placeholder="Username">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="password-strength mt-2">
                                                    <div class="progress" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">Kekuatan password: <span id="password-strength-text">Lemah</span></small>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="confirm_password">Konfirmasi Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="confirm_password" placeholder="Konfirmasi password">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div id="password-match" class="mt-2"></div>
                                            </div>
                                        </div>

                                        <div class="form-check form-switch mt-3">
                                            <input class="form-check-input" type="checkbox" id="twoFactorAuth">
                                            <label class="form-check-label" for="twoFactorAuth">Aktifkan Two-Factor Authentication</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="sendCredentials">
                                            <label class="form-check-label" for="sendCredentials">Kirim kredensial melalui email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="btn btn-outline-secondary">
                                        <i class="fa fa-arrow-left me-2"></i>Kembali
                                    </a>
                                    <div>
                                        <button type="reset" class="btn btn-outline-danger me-2">
                                            <i class="fa fa-times me-2"></i>Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-user-plus me-2"></i>Tambah Pengguna
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
}

.card-header.bg-soft-primary {
    background-color: rgba(79, 70, 229, 0.1);
    border-bottom: 1px solid rgba(79, 70, 229, 0.2);
}

/* Avatar Upload Styles */
.avatar-upload {
    position: relative;
    max-width: 120px;
    margin: 0 auto;
}

.avatar-edit {
    position: absolute;
    right: 0;
    z-index: 1;
    bottom: 0;
}

.avatar-edit input {
    display: none;
}

.avatar-edit label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
}

.avatar-edit label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
}

.avatar-preview {
    width: 120px;
    height: 120px;
    position: relative;
    border-radius: 100%;
    border: 3px solid #F8F9FA;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

.password-strength .progress {
    border-radius: 3px;
}

.toggle-password {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.text-danger {
    color: #f44336 !important;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .avatar-upload {
        max-width: 100px;
    }

    .avatar-preview {
        width: 100px;
        height: 100px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Avatar upload preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').style.backgroundImage = 'url(' + e.target.result + ')';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById("imageUpload").addEventListener('change', function() {
        readURL(this);
    });

    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input');
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);

            // Toggle icon
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    });

    // Password strength indicator
    const passwordInput = document.getElementById('password');
    const strengthBar = document.querySelector('.password-strength .progress-bar');
    const strengthText = document.getElementById('password-strength-text');

    if (passwordInput && strengthBar && strengthText) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength += 20;
            if (password.match(/[a-z]+/)) strength += 20;
            if (password.match(/[A-Z]+/)) strength += 20;
            if (password.match(/[0-9]+/)) strength += 20;
            if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength += 20;

            strengthBar.style.width = strength + '%';

            if (strength < 40) {
                strengthBar.className = 'progress-bar bg-danger';
                strengthText.textContent = 'Lemah';
            } else if (strength < 80) {
                strengthBar.className = 'progress-bar bg-warning';
                strengthText.textContent = 'Sedang';
            } else {
                strengthBar.className = 'progress-bar bg-success';
                strengthText.textContent = 'Kuat';
            }
        });
    }

    // Password confirmation check
    const confirmPasswordInput = document.getElementById('confirm_password');
    const passwordMatch = document.getElementById('password-match');

    if (confirmPasswordInput && passwordMatch) {
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value !== passwordInput.value) {
                passwordMatch.innerHTML = '<small class="text-danger"><i class="fa fa-times-circle me-1"></i>Password tidak cocok</small>';
            } else {
                passwordMatch.innerHTML = '<small class="text-success"><i class="fa fa-check-circle me-1"></i>Password cocok</small>';
            }
        });
    }
});
</script>
@endsection
