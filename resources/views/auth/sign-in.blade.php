<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Masjid Manage | Sign In</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}">
</head>
<body>

<div class="wrapper">
  <section class="login-content">
    <div class="row m-0 align-items-center bg-white vh-100">
      <div class="col-md-6">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
              <div class="card-body">

                <h2 class="mb-2 text-center">Sign In</h2>
                <p class="text-center">Login to stay connected.</p>

                @if ($errors->any())
                  <div class="alert alert-danger">
                    {{ $errors->first() }}
                  </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required autofocus>
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>

                  <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="remember" id="remember">
                      <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <a href="{{ url('/recoverpw') }}">Forgot Password?</a>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

                <p class="text-center my-3">or sign in with other accounts?</p>
                <div class="text-center">
                  <a href="#"><img src="{{ asset('assets/images/brands/gm.svg') }}" alt="gm"></a>
                </div>

                <p class="mt-3 text-center">
                  Don't have an account? <a href="{{ url('/sign-up') }}">Click here to sign up.</a>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 d-none d-md-block bg-primary vh-100">
        <img src="{{ asset('assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
      </div>
    </div>
  </section>
</div>

<!-- JS -->
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
