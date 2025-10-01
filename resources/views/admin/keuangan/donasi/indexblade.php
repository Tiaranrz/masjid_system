<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            <div class="logo-main">
                <div class="logo-normal">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 50px;">
                </div>
                <div class="logo-mini">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Mini" style="height: 32px;">
                </div>
            </div>
            <h4 class="logo-title">Admin Masjid</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                   <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="{{ Request::is('admin/masjid*') ? 'true' : 'false' }}" aria-controls="menu-masjid">
                        <div>
                             <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon-20">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </i>
                            <span class="nav-text">Informasi Masjid</span>
                        </div>
                       <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('admin.masjid.index') }}">
                                <i class="ri-file-user-line"></i>
                                <span class="item-name">Profil Dasar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.masjid.index') }}">
                                <i class="ri-contacts-book-line"></i>
                                <span class="item-name">Kontak & Media</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.masjid.index') }}">
                                <i class="ri-settings-3-line"></i>
                                <span class="item-name">Pengaturan Sistem</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Manajemen Keuangan (Dropdown) --}}
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-keuangan" role="button" aria-expanded="false" aria-controls="menu-keuangan">
                        <i class="ri-money-dollar-box-fill"></i>
                        <span class="nav-text">Manajemen Keuangan</span>
                        <i class="ri-arrow-right-s-line float-end ms-2"></i>
                    </a>
                    <ul class="collapse list-unstyled iq-submenu {{ Request::is('admin/keuangan*') ? 'show' : '' }}" id="keuangan-menu" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/keuangan/donasi') ? 'active' : '' }}" href="{{ route('admin.keuangan.donasi') }}">
                                <i class="ri-wallet-3-line"></i>
                                <span class="nav-text">Donasi Umum</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/keuangan/ziswaf') ? 'active' : '' }}" href="{{ route('admin.keuangan.ziswaf') }}">
                                <i class="ri-hand-coin-line"></i>
                                <span class="nav-text">ZISWAF</span>
                            </a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link {{ Request::is('admin/keuangan/rekap') ? 'active' : '' }}" href="{{ route('admin.keuangan.index') }}">
                                <i class="ri-file-chart-line"></i>
                                <span class="nav-text">Rekapitulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Jadwal Event --}}
                <li class="nav-item">
                    <a href="{{ route('admin.event.index') }}" class="nav-link {{ Request::is('admin/event*') ? 'active' : '' }}">
                        <i class="ri-calendar-event-fill"></i>
                        <span class="nav-text">Jadwal Event</span>
                    </a>
                </li>

                {{-- Manajemen Inventory --}}
                <li class="nav-item">
                    <a href="{{ route('admin.inventory.index') }}" class="nav-link {{ Request::is('admin/inventory*') ? 'active' : '' }}">
                        <i class="ri-box-3-fill"></i>
                        <span class="nav-text">Manajemen Inventory</span>
                    </a>
                </li>

                {{-- Manajemen Jamaah --}}
                <li class="nav-item">
                    <a href="{{ route('admin.jamaah.index') }}" class="nav-link {{ Request::is('admin/jamaah*') ? 'active' : '' }}">
                        <i class="ri-group-fill"></i>
                        <span class="nav-text">Manajemen Jamaah</span>
                    </a>
                </li>

                {{-- Laporan --}}
                <li class="nav-item">
                    <a href="{{ route('admin.laporan.index') }}" class="nav-link {{ Request::is('admin/laporan*') ? 'active' : '' }}">
                        <i class="ri-file-chart-fill"></i>
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>

                {{-- Notifikasi (Disesuaikan sebagai menu tunggal) --}}
                <li class="nav-item">
                    <a class="nav-link" href="#notifikasi">
                        <i class="ri-notification-3-line"></i>
                        <span class="item-name">Notifikasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
