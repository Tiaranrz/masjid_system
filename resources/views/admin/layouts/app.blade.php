<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masjid Admin | @yield('title', 'Dashboard')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    {{-- Mengganti Font Awesome dengan Remix Icon agar konsisten dengan Hope UI --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dark.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.min.css') }}" />

    @stack('styles')
</head>

<body class="  ">

    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <div class="wrapper">

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        <div class="main-content">

            <div class="position-relative iq-banner">
                {{-- Navbar --}}
                @include('admin.layouts.nav')

                {{-- Nav Header Component Start: INI ADALAH BACKGROUND BANNER YANG HILANG --}}
                <div class="iq-navbar-header" style="height: 215px;">
                    <div class="container-fluid iq-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="flex-wrap d-flex justify-content-between align-items-center">
                                    <div>
                                        <h1>@yield('title_header', 'Dashboard')</h1>
                                        <p>Kelola Masjid Anda dengan mudah dan efisien.</p>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-link btn-soft-light">
                                            <i class="ri-notification-3-line"></i> Pengumuman
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Blok Gambar Header --}}
                    <div class="iq-header-img">
                        {{-- Path ini harus mengarah ke public/assets/... --}}
                        <img src="{{ asset('assets/images/dashboard/logo-atas.jpg') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                        {{-- Tambahkan gambar tema lain di sini jika diperlukan --}}
                    </div>
                </div>
                {{-- Nav Header Component End --}}
            </div>

            {{-- Main Content Area --}}
            <main class="py-0">
                <div class="conatiner-fluid content-inner mt-n5 py-0">
                    @yield('content')
                </div>
            </main>

            {{-- Footer harus di dalam main-content atau di luar main-content,
                 tapi untuk Hope UI, mari kita masukkan di sini: --}}
            <footer class="footer">
                <div class="footer-body">
                    <ul class="left-panel list-inline mb-0 p-0">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                    <div class="right-panel">
                        ©<script>document.write(new Date().getFullYear())</script> Masjid Manage, Made with
                        <span class="text-danger"><i class="ri-heart-fill"></i></span> by IQONIC Design.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- End Wrapper --}}

    {{-- Script Bundles --}}
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts/widgetcharts.js') }}"></script>
    <script src="{{ asset('assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('assets/js/charts/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/setting.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slider-tabs.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/form-wizard.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    @stack('scripts')
</body>
</html>
