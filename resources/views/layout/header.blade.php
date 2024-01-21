<header class="app-header">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
        <!-- Start::header-content-left -->
        <div class="header-content-left">
            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="{{  route('admin.home') }}" class="header-logo">
                        <img src="/assets/img/logo.png" alt="logo"
                            class="desktop-logo" />
                        <img src="/assets/img/logo.png" alt="logo"
                            class="toggle-logo" />
                        <img src="/assets/img/logo-white.png" alt="logo"
                            class="desktop-dark" />
                        <img src="/assets/img/logo-white.png" alt="logo"
                            class="toggle-dark" />
                    </a>
                </div>
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-left -->
        <!-- Start::header-content-right -->
        <div class="header-content-right">
           <!-- Start::header-element -->
           <div class="header-element header-search">
            <!-- Start::header-link -->
            <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                data-bs-target="#searchModal">
                <i class="bx bx-search-alt-2 header-link-icon"></i>
            </a>
            <!-- End::header-link -->
        </div>
        <!-- End::header-element -->
            

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-moon header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="bx bx-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element notifications-dropdown">
               
                @include('partials.notification')
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="{{ route('admin.home') }}" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-sm-2 me-0">
                            <img src="/vendors/assets/images/faces/9.jpg" alt="img" width="32" height="32"
                                class="rounded-circle" />
                        </div>
                        @php
                            // Call the function to get admin details
                            $adminDetails = get_admin_details();
                        @endphp
                        <div class="d-sm-block d-none">
                            <p class="fw-semibold mb-0 lh-1">{{  $adminDetails->name    }}</p>
                            {{-- <span class="op-7 fw-normal d-block fs-11">Web Designer</span> --}}
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                
                <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li>
                        <a class="dropdown-item d-flex" href="{{ route('admin.profile-page') }}"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="{{ route('admin.profile-page') }}"><i class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i>Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                        </a>
                        <form action="{{ route('admin.logout') }}" clas="d-none" method="post" id="logout-form">
                          @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->
            <!-- Start::header-element -->
            <div class="header-element" style="display: none;">
                <!-- Start::header-link|switcher-icon -->
                <a href="#" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                    data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->
        </div>
        <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->
</header>


<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('admin.search-engine') }}" id="Search" method="GET">
                    <div class="input-group">
                            <input type="search" class="form-control border-0 px-2" name="search"
                            value="" placeholder="Search"
                            aria-label="Username" />
                            <a href="{{ route('admin.search-engine') }}" class="input-group-text" onclick="event.preventDefault(); document.getElementById('Search').submit();" id="Search-Grid"><i
                                    class="fe fe-search header-link-icon fs-18"></i></a>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

