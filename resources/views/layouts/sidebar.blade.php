<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('superadmin.dashboard') }}" class="navbar-brand">
            <div class="logo-main">
                <div class="logo-normal">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 50px;">
                </div>
                <div class="logo-mini">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Mini" style="height: 32px;">
                </div>
            </div>
            <h4 class="logo-title">Manajement<br> Masjid</h4>
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
                    <a class="nav-link" aria-current="page" href="{{ route('superadmin.dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                @auth
                @if (auth()->user()->role === 'superadmin')
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="false" aria-controls="menu-masjid">
                        <div>
                            <i class="fas fa-mosque"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path d="M0 480c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V160H0v320zm579.16-192c17.86-17.39 28.84-37.34 28.84-58.91 0-52.86-41.79-93.79-87.92-122.9-41.94-26.47-80.63-57.77-111.96-96.22L400 0l-8.12 9.97c-31.33 38.45-70.01 69.76-111.96 96.22C233.79 135.3 192 176.23 192 229.09c0 21.57 10.98 41.52 28.84 58.91h358.32zM608 320H192c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h32v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h32c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                            </svg>
                            <span class="item-name">Manajemen Informasi Masjid</span>
                        </div>
                        <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.masjid.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                        <path d="m.5 3 .04.87a1.45 1.45 0 0 0 .95 1.18L3 6.94c.5.28.87.8.87 1.32v3.74c0 1.25-.8 2.2-2.18 2.2H.5zm3.87-1.13c.4-.2.85-.31 1.34-.31a2.86 2.86 0 0 1 2.5 1.25l.8.96a2.86 2.86 0 0 0 2.5 1.25H16l-1.5 8c-.1.54-.53.95-1.07.95H3.5a1.5 1.5 0 0 1-1.5-1.5V6.5a1.5 1.5 0 0 0-1.5-1.5H.5a.5.5 0 0 0-.5.5v7.5a2.5 2.5 0 0 0 2.5 2.5h11c1.65 0 2.75-.95 2.75-2.2v-7.5c0-.68-.28-1.29-.75-1.74l-.87-1.05a2.76 2.76 0 0 0-2.38-1.12C12.5 2.5 11.23 3 9.87 3a2.5 2.5 0 0 0-2.13 1H6.5c-.7 0-1.5-.5-2.2-1.37z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Profil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.status_masjid.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Status Masjid</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M4 20C4 16 8 14 12 14C16 14 20 16 20 20H4Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Jumlah User</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="false" aria-controls="menu-masjid">
                        <div>
                            <i class="fas fa-mosque"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path d="M0 480c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V160H0v320zm579.16-192c17.86-17.39 28.84-37.34 28.84-58.91 0-52.86-41.79-93.79-87.92-122.9-41.94-26.47-80.63-57.77-111.96-96.22L400 0l-8.12 9.97c-31.33 38.45-70.01 69.76-111.96 96.22C233.79 135.3 192 176.23 192 229.09c0 21.57 10.98 41.52 28.84 58.91h358.32zM608 320H192c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h32v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h32c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                            </svg>
                            <span class="item-name">Manajemen Keuangan</span>
                        </div>
                        <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                        <path d="m.5 3 .04.87a1.45 1.45 0 0 0 .95 1.18L3 6.94c.5.28.87.8.87 1.32v3.74c0 1.25-.8 2.2-2.18 2.2H.5zm3.87-1.13c.4-.2.85-.31 1.34-.31a2.86 2.86 0 0 1 2.5 1.25l.8.96a2.86 2.86 0 0 0 2.5 1.25H16l-1.5 8c-.1.54-.53.95-1.07.95H3.5a1.5 1.5 0 0 1-1.5-1.5V6.5a1.5 1.5 0 0 0-1.5-1.5H.5a.5.5 0 0 0-.5.5v7.5a2.5 2.5 0 0 0 2.5 2.5h11c1.65 0 2.75-.95 2.75-2.2v-7.5c0-.68-.28-1.29-.75-1.74l-.87-1.05a2.76 2.76 0 0 0-2.38-1.12C12.5 2.5 11.23 3 9.87 3a2.5 2.5 0 0 0-2.13 1H6.5c-.7 0-1.5-.5-2.2-1.37z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Donasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <a href="{{ route('superadmin.roles.index') }}" ...>
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M4 20C4 16 8 14 12 14C16 14 20 16 20 20H4Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">ZISWAF</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="false" aria-controls="menu-masjid">
                        <div>
                            <i class="fas fa-mosque"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path d="M0 480c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V160H0v320zm579.16-192c17.86-17.39 28.84-37.34 28.84-58.91 0-52.86-41.79-93.79-87.92-122.9-41.94-26.47-80.63-57.77-111.96-96.22L400 0l-8.12 9.97c-31.33 38.45-70.01 69.76-111.96 96.22C233.79 135.3 192 176.23 192 229.09c0 21.57 10.98 41.52 28.84 58.91h358.32zM608 320H192c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h32v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h32c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                            </svg>
                            <span class="item-name">Jadwal Event</span>
                        </div>
                        <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                        <path d="m.5 3 .04.87a1.45 1.45 0 0 0 .95 1.18L3 6.94c.5.28.87.8.87 1.32v3.74c0 1.25-.8 2.2-2.18 2.2H.5zm3.87-1.13c.4-.2.85-.31 1.34-.31a2.86 2.86 0 0 1 2.5 1.25l.8.96a2.86 2.86 0 0 0 2.5 1.25H16l-1.5 8c-.1.54-.53.95-1.07.95H3.5a1.5 1.5 0 0 1-1.5-1.5V6.5a1.5 1.5 0 0 0-1.5-1.5H.5a.5.5 0 0 0-.5.5v7.5a2.5 2.5 0 0 0 2.5 2.5h11c1.65 0 2.75-.95 2.75-2.2v-7.5c0-.68-.28-1.29-.75-1.74l-.87-1.05a2.76 2.76 0 0 0-2.38-1.12C12.5 2.5 11.23 3 9.87 3a2.5 2.5 0 0 0-2.13 1H6.5c-.7 0-1.5-.5-2.2-1.37z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Donasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <a href="{{ route('superadmin.roles.index') }}" ...>
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M4 20C4 16 8 14 12 14C16 14 20 16 20 20H4Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">ZISWAF</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="false" aria-controls="menu-masjid">
                        <div>
                            <i class="fas fa-mosque"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path d="M0 480c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V160H0v320zm579.16-192c17.86-17.39 28.84-37.34 28.84-58.91 0-52.86-41.79-93.79-87.92-122.9-41.94-26.47-80.63-57.77-111.96-96.22L400 0l-8.12 9.97c-31.33 38.45-70.01 69.76-111.96 96.22C233.79 135.3 192 176.23 192 229.09c0 21.57 10.98 41.52 28.84 58.91h358.32zM608 320H192c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h32v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h32c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                            </svg>
                            <span class="item-name">Manajemen Inventory</span>
                        </div>
                        <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                        <path d="m.5 3 .04.87a1.45 1.45 0 0 0 .95 1.18L3 6.94c.5.28.87.8.87 1.32v3.74c0 1.25-.8 2.2-2.18 2.2H.5zm3.87-1.13c.4-.2.85-.31 1.34-.31a2.86 2.86 0 0 1 2.5 1.25l.8.96a2.86 2.86 0 0 0 2.5 1.25H16l-1.5 8c-.1.54-.53.95-1.07.95H3.5a1.5 1.5 0 0 1-1.5-1.5V6.5a1.5 1.5 0 0 0-1.5-1.5H.5a.5.5 0 0 0-.5.5v7.5a2.5 2.5 0 0 0 2.5 2.5h11c1.65 0 2.75-.95 2.75-2.2v-7.5c0-.68-.28-1.29-.75-1.74l-.87-1.05a2.76 2.76 0 0 0-2.38-1.12C12.5 2.5 11.23 3 9.87 3a2.5 2.5 0 0 0-2.13 1H6.5c-.7 0-1.5-.5-2.2-1.37z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Data Inventory Masjid</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <a href="{{ route('superadmin.roles.index') }}" ...>
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M4 20C4 16 8 14 12 14C16 14 20 16 20 20H4Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">ZISWAF</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#menu-masjid" role="button" aria-expanded="false" aria-controls="menu-masjid">
                        <div>
                            <i class="fas fa-mosque"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -64 640 640" width="20" height="20" fill="currentColor" aria-hidden="true">
                                <path d="M0 480c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V160H0v320zm579.16-192c17.86-17.39 28.84-37.34 28.84-58.91 0-52.86-41.79-93.79-87.92-122.9-41.94-26.47-80.63-57.77-111.96-96.22L400 0l-8.12 9.97c-31.33 38.45-70.01 69.76-111.96 96.22C233.79 135.3 192 176.23 192 229.09c0 21.57 10.98 41.52 28.84 58.91h358.32zM608 320H192c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h32v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h64v-72c0-48 48-72 48-72s48 24 48 72v72h64v-64c0-17.67 14.33-32 32-32s32 14.33 32 32v64h32c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32zM64 0S0 32 0 96v32h128V96c0-64-64-96-64-96z" />
                            </svg>
                            <span class="item-name">Manajemen Inventory</span>
                        </div>
                        <i class="right-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </a>
                     <ul class="collapse show list-unstyled ps-4" id="menu-masjid">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('superadmin.users.index') }}">
                                <i class="icon">
                                    <svg width="20" height="20" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                                        <path d="m.5 3 .04.87a1.45 1.45 0 0 0 .95 1.18L3 6.94c.5.28.87.8.87 1.32v3.74c0 1.25-.8 2.2-2.18 2.2H.5zm3.87-1.13c.4-.2.85-.31 1.34-.31a2.86 2.86 0 0 1 2.5 1.25l.8.96a2.86 2.86 0 0 0 2.5 1.25H16l-1.5 8c-.1.54-.53.95-1.07.95H3.5a1.5 1.5 0 0 1-1.5-1.5V6.5a1.5 1.5 0 0 0-1.5-1.5H.5a.5.5 0 0 0-.5.5v7.5a2.5 2.5 0 0 0 2.5 2.5h11c1.65 0 2.75-.95 2.75-2.2v-7.5c0-.68-.28-1.29-.75-1.74l-.87-1.05a2.76 2.76 0 0 0-2.38-1.12C12.5 2.5 11.23 3 9.87 3a2.5 2.5 0 0 0-2.13 1H6.5c-.7 0-1.5-.5-2.2-1.37z"/>
                                    </svg>
                                </i>
                                <span class="item-name">Data Inventory Masjid</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <a href="{{ route('superadmin.roles.index') }}" ...>
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M4 20C4 16 8 14 12 14C16 14 20 16 20 20H4Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">ZISWAF</span>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#notifikasi">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.9a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6 c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 a5.002 5.002 0 0 0-3.005-4.9" /></path>
                                </svg>
                            </i>
                        <span class="item-name">Notifikasi</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
