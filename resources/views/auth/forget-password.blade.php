<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hope UI | Forgot Password</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

  <!-- Library / Plugin Css Build -->
  <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

  <!-- Hope Ui Design System Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css') }}" />

  <!-- Custom Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}" />

  <!-- Dark Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}" />

  <!-- Customizer Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />

  <!-- RTL Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />
</head>
<body>
  <div class="wrapper">
    <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
        <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
          <img src="{{ asset('assets/images/auth/02.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
        </div>
        <div class="col-md-6 p-0">
          <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
            <div class="card-body">
              <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center mb-3">
                <div class="logo-main">
                  <div class="logo-normal">
                    <!-- HopeUI SVG logo -->
                    <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                      <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                      <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                      <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                    </svg>
                  </div>
                </div>
                <h4 class="logo-title ms-3">Hope UI</h4>
              </a>

              <h2 class="mb-2">Reset Password</h2>
              <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>

              <!-- ✅ FORM LARAVEL -->
<form method="POST" action="{{ route('password.email') }}">
  @csrf
  <div class="row">
    <div class="col-lg-12">
      <div class="floating-label form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email"
               value="{{ old('email') }}" required autofocus>
      </div>
    </div>
  </div>

  @error('email')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
  @enderror

  @if (session('status'))
    <div class="alert alert-success mt-2">
      {{ session('status') }}
    </div>
  @endif

  <button type="submit" class="btn btn-primary w-100 mt-3">
    Send Reset Link
  </button>
</form>


              <!-- ✅ tampilkan error -->
              @if ($errors->any())
                <div class="alert alert-danger mt-3">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              @if (session('status'))
                <div class="alert alert-success mt-3">
                  {{ session('status') }}
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Library Bundle Script -->
  <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
  <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>
  <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
  <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>
  <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
</body>
</html>
