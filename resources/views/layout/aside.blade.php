<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="{{ route('admin.home') }}" class="header-logo">
            <img src="/assets/img/logo.png" alt="logo" class="desktop-logo" />
            <img src="/assets/img/logo.png" alt="logo" class="toggle-logo" />
            <img src="/assets/img/logo-white.png" alt="logo" class="desktop-dark" />
            <img src="/assets/img/logo-white.png" alt="logo" class="toggle-dark" />
        </a>
    </div>
    <!-- End::main-sidebar-header -->
    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide -->
                <li class="slide has-sub open">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Main</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(239.5px, 1233.5px, 0px); display: block; box-sizing: border-box;" data-popper-placement="bottom" data-popper-escaped="" data-popper-reference-hidden="">
                        <li class="slide ">
                            <a href="{{  route('admin.home')  }}" class="side-menu__item">
                                
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                Account  
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{  route('admin.profile-page') }}" class="side-menu__item">Account Setting</a>
                                </li>
                                <li class="slide">
                                    <a href="{{  route('admin.user-page') }}" class="side-menu__item">Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a href="{{  route('admin.user.retention.index') }}" class="side-menu__item">
                                <span class="side-menu__label">Retention</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                    </ul>
                </li> 
                <li class="slide has-sub open">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-file side-menu__icon"></i>
                        <span class="side-menu__label">Transactions</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(239.5px, 1233.5px, 0px); display: block; box-sizing: border-box;" data-popper-placement="bottom" data-popper-escaped="" data-popper-reference-hidden="">
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                Flight  Transactions   
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{  route('admin.local-flight-page') }}" class="side-menu__item">Local Flight </a>
                                </li>
                                <li class="slide">
                                    <a href="{{  route('admin.international-flight-page') }}" class="side-menu__item">International Flight</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Tuition  Transactions <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('admin.tuition-payment-page') }}" class="side-menu__item">Tuition Payment</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('admin.tuition-wire-transfer-page') }}" class="side-menu__item">Tuition Payment wire transfer</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Merchandise  Transactions <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{  route('admin.merchandise-page') }}" class="side-menu__item">Merchandise Payment</a>
                                </li>
                            </ul>
                        </li>
                         <!-- Start::slide -->
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Visa  Transactions <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('admin.visa-application-canada-page') }}" class="side-menu__item">Canada Visa Application</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('admin.visa-application-page') }}" class="side-menu__item">USA Visa Application</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                Otherservice  Transactions <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{  route('admin.otherservices-page') }}" class="side-menu__item">Other services </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Corporate Transactions <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('admin.corporate-service-page')  }}" class="side-menu__item">Corporate </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- End::slide__category -->
                
                
                
                <li class="slide has-sub open">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-file-blank side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate3d(239.5px, 1233.5px, 0px); display: block; box-sizing: border-box;" data-popper-placement="bottom" data-popper-escaped="" data-popper-reference-hidden="">
                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('admin.kyc.index') }}" class="side-menu__item">
                                <span class="side-menu__label">Kyc</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Blog <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('admin.Post.index') }}" class="side-menu__item">Blog</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('admin.Post.create') }}" class="side-menu__item">Create Blog</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Start::slide__category -->
                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">Mail <i
                                    class="fe fe-chevron-right side-menu__angle"></i></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="{{ route('admin.send-mail-page') }}" class="side-menu__item">Mail</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('admin.send-mail-create') }}" class="side-menu__item">Send Mail</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a href="{{ route('admin.transaction-charge-page') }}" class="side-menu__item">Services Charges</a>
                        </li>
                        <li class="slide">
                            <a href="{{  route('admin.features-page') }}" class="side-menu__item">
                            Features
                            </a>
                        </li>
                        <li class="slide">
                            <a href="{{  route('admin.baggage-page') }}" class="side-menu__item">
                            Baggage
                            </a>
                        </li>
                    </ul>
                </li>
                 
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
        <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
</aside>