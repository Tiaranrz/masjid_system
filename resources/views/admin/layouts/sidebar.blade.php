<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ url('admin.dashboard') }}" class="navbar-brand">
            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    <!-- Contoh logo masjid (bisa diganti sesuai kebutuhan) -->
                    <svg class="icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 2L22 10H8L15 2Z" fill="currentColor"/>
                        <rect x="10" y="10" width="10" height="12" rx="2" fill="currentColor"/>
                        <rect x="13" y="22" width="4" height="6" rx="1" fill="currentColor"/>
                    </svg>
                </div>
                <div class="logo-mini">
                    <svg class="icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 2L22 10H8L15 2Z" fill="currentColor"/>
                    </svg>
                </div>
            </div>
            <!--Logo End-->
            <h5 class="logo-title">Admin Masjid</h5>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Menu</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                        <i class="icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 13h8V3H3v10zM13 21h8v-6h-8v6zM13 3v6h8V3h-8zM3 21h8v-4H3v4z" fill="currentColor"/>
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>

                <!-- Jamaah Management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('jamaah*') ? 'active' : '' }}" href="{{ url('jamaah') }}">
                        <i class="icon">
                            <svg class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                <path d="M5 21v-2a4 4 0 014-4h6a4 4 0 014 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </i>
                        <span class="item-name">Jamaah Management</span>
                    </a>
                </li>

                <!-- Event Management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('event*') ? 'active' : '' }}" href="{{ url('event') }}">
                        <i class="icon">
                            <svg class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </i>
                        <span class="item-name">Event Management</span>
                    </a>
                </li>

                <!-- Asset & Inventory Management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('asset*') ? 'active' : '' }}" href="{{ url('asset') }}">
                        <i class="icon">
                            <svg class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="7" width="18" height="13" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M16 3v4M8 3v4M3 11h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </i>
                        <span class="item-name">Asset & Inventory</span>
                    </a>
                </li>

                <!-- Ziswaf Management -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('ziswaf*') ? 'active' : '' }}" href="{{ url('ziswaf') }}">
                        <i class="icon">
                            <svg class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 7v5l3 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </i>
                        <span class="item-name">Ziswaf Management</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
