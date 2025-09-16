<main class="main-content">
  <div class="position-relative iq-banner">
    <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
      <div class="container-fluid navbar-inner">
        <a href="{{ url('admin/dashboard') }}" class="navbar-brand">
          <div class="logo-main">
            <div class="logo-normal">
              <!-- Logo Masjid sederhana -->
              <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 2L22 10H8L15 2Z" fill="currentColor"/>
                <rect x="10" y="10" width="10" height="12" rx="2" fill="currentColor"/>
                <rect x="13" y="22" width="4" height="6" rx="1" fill="currentColor"/>
              </svg>
            </div>
            <div class="logo-mini">
              <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 2L22 10H8L15 2Z" fill="currentColor"/>
              </svg>
            </div>
          </div>
          <h4 class="logo-title">Admin Masjid</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
          <i class="icon">
            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
              <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
            </svg>
          </i>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <span class="mt-2 navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
            <li class="me-0 me-xl-2"></li>

            <!-- Bahasa / Language Dropdown (bisa disesuaikan) -->
            <li class="nav-item dropdown">
              <a href="#" class="search-toggle nav-link" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/images/Flag/flag001.png') }}" class="img-fluid rounded-circle" alt="user" style="height: 30px; min-width: 30px; width: 30px;">
                <span class="bg-primary"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                <div class="m-0 border-0 shadow-none card">
                  <div class="p-0">
                    <ul class="p-0 list-group list-group-flush">
                      <li class="iq-sub-card list-group-item">
                        <a class="p-0" href="#"><img src="{{ asset('assets/images/Flag/flag-03.png') }}" alt="img-flag" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Spanish</a>
                      </li>
                      <li class="iq-sub-card list-group-item">
                        <a class="p-0" href="#"><img src="{{ asset('assets/images/Flag/flag-04.png') }}" alt="img-flag" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Italian</a>
                      </li>
                      <li class="iq-sub-card list-group-item">
                        <a class="p-0" href="#"><img src="{{ asset('assets/images/Flag/flag-02.png') }}" alt="img-flag" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>French</a>
                      </li>
                      <li class="iq-sub-card list-group-item">
                        <a class="p-0" href="#"><img src="{{ asset('assets/images/Flag/flag-05.png') }}" alt="img-flag" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>German</a>
                      </li>
                      <li class="iq-sub-card list-group-item">
                        <a class="p-0" href="#"><img src="{{ asset('assets/images/Flag/flag-06.png') }}" alt="img-flag" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;"/>Japanese</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>

            <!-- Notifikasi -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"/>
                  <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"/>
                </svg>
                <span class="bg-danger dots"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                {{-- Konten Notifikasi --}}
              </div>
            </li>

            <!-- Pesan -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"/>
                  <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"/>
                </svg>
                <span class="bg-primary count-mail"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="mail-drop">
                {{-- Konten Pesan --}}
              </div>
            </li>

            @auth
            <li class="nav-item dropdown">
              <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/images/avatars/01.png') }}" alt="User -Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                <div class="caption ms-3 d-none d-md-block">
                  <h6 class="mb-0 caption-title">{{ auth()->user()->name }}</h6>
                  <p class="mb-0 caption-sub-title">{{ auth()->user()->role ?? auth()->user()->email }}</p>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ url('app/user-profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="#">Privacy Setting</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); this.closest('form').submit();">
                      Logout
                    </a>
                  </form>
                </li>
              </ul>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
        <div class="row">
          <div class="col-md-12">
            <div class="flex-wrap d-flex justify-content-between align-items-center">
              <div>
                <h1>Selamat Datang di Admin Masjid!</h1>
                <p>Kelola jamaah, acara, aset, dan Ziswaf dengan mudah dan efisien.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="iq-header-img">
        <img src="{{ asset('assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        {{-- ... gambar header lainnya ... --}}
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</main>
