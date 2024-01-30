<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard-page') }}">
                <img src="/assets/img/logo-white.png" class="header-brand-img w-50 desktop-logo" alt="logo">
                <img src="/assets/img/logo-white.png" class="header-brand-img w-50 toggle-logo"
                    alt="logo">
                <img src="/assets/img/black-logo.png" class="header-brand-img w-50 light-logo" alt="logo">
                <img src="/assets/img/black-logo.png" class="header-brand-img w-50 light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link"  href="{{ route('dashboard-page') }}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="{{ route('deposit-page') }}">
                        {{-- <i class="side-menu__icon fe fe-credit-card"></i> --}}
                        <i class="side-menu__icon mdi mdi-wallet"></i>
                        <span class="side-menu__label">Accounts</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="/dashboard/initiator">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Initiator</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="/dashboard/manage">
                        <i class="side-menu__icon fe fe-file"></i>
                        <span class="side-menu__label">Manage</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="side-menu__icon fe fe-log-out text-danger"></i>
                        <span class="side-menu__label">Log out</span>
                    </a>
                    <form id="logout-form" clas="d-none"
                        action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>