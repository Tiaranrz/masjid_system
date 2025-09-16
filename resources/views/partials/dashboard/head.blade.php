<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

<!-- Library / Plugin Css Build -->
<link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

@if (!empty($animation) && $animation === true)
    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />
@endif

<!-- Hope UI Design System Css -->
<link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css') }}?v={{ $version ?? '1.0.0' }}" />

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}?v={{ $version ?? '1.0.0' }}" />
