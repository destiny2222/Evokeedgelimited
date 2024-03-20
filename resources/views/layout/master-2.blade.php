<!DOCTYPE html>
<html ang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
data-menu-styles="dark" data-toggled="close">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>EvokeEgde Limited - Admin  Dashboard </title>
    <meta name="Description" content="" />
    <meta name="Author" content="" />
    <meta name="keywords"
        content="" />
    <!-- Favicon -->
    <link rel="icon" href=""
        type="image/x-icon" />
    <!-- Choices JS -->
    <script src="/vendors/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <!-- Main Theme Js -->
    <script src="/vendors/assets/js/main.js"></script>
    <!-- Bootstrap Css -->
    <link id="style" href="/vendors/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Style Css -->
    <link href="/vendors/assets/css/styles.min.css" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="/vendors/assets/css/icons.css" rel="stylesheet" />
    <!-- Node Waves Css -->
    <link href="/vendors/assets/libs/node-waves/waves.min.css" rel="stylesheet" />
    <!-- Simplebar Css -->
    <link href="/vendors/assets/libs/simplebar/simplebar.min.css" rel="stylesheet" />
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="/vendors/assets/libs/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/vendors/assets/libs/%40simonwep/pickr/themes/nano.min.css" />
    <!-- Choices Css -->
    <link rel="stylesheet" href="/vendors/assets/libs/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="/vendors/assets/libs/jsvectormap/css/jsvectormap.min.css" />
    <link rel="stylesheet" href="/vendors/assets/libs/swiper/swiper-bundle.min.css" />
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="/vendors/assets/libs/quill/quill.snow.css">
    <!-- <link rel="stylesheet" href="/vendors/assets/libs/quill/quill.bubble.css"> Filepond CSS -->
    <link rel="stylesheet" href="/vendors/assets/libs/filepond/filepond.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"/>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <style>
        #yourBtn {
            position: relative;
            top: 0px;
            font-family: calibri;
            width: 100%;
            padding: 25px  30px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border: 1px dashed #BBB;
            text-align: center;
            background-color: #DDD;
            cursor: pointer;
            }
    </style>
    <meta http-equiv="imagetoolbar" content="no" />
</head>

<body>
 <!-- Start Switcher -->
 <div  class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">
            Switcher
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="border-bottom border-block-end-dashed">
            <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                    data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                    aria-selected="true">
                    Theme Styles
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                aria-labelledby="switcher-home-tab" tabindex="0">
                <div class="">
                    <p class="switcher-style-head">Theme Color Mode:</p>
                    <div class="row switcher-style gx-0">
                        <div class="col-4">
                            <div class="form-check switch-select">
                                <label class="form-check-label" for="switcher-light-theme">
                                    Light
                                </label>
                                <input class="form-check-input" type="radio" name="theme-style"
                                    id="switcher-light-theme" checked />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check switch-select">
                                <label class="form-check-label" for="switcher-dark-theme">
                                    Dark
                                </label>
                                <input class="form-check-input" type="radio" name="theme-style"
                                    id="switcher-dark-theme" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
        aria-labelledby="switcher-profile-tab" tabindex="0">
        <div>
            <div class="theme-colors">
                <p class="switcher-style-head">Menu Colors:</p>
                <div class="d-flex switcher-style pb-2">
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                            id="switcher-menu-light"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                            id="switcher-menu-dark" checked> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                            id="switcher-menu-primary"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                            id="switcher-menu-gradient"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Transparent Menu" type="radio" name="menu-colors"
                            id="switcher-menu-transparent"> </div>
                </div>
                <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                    change from below Theme Primary color picker</div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Header Colors:</p>
                <div class="d-flex switcher-style pb-2">
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                            id="switcher-header-light" checked> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                            id="switcher-header-dark"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                            id="switcher-header-primary"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Gradient Header" type="radio"
                            name="header-colors" id="switcher-header-gradient"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Transparent Header" type="radio"
                            name="header-colors" id="switcher-header-transparent"> </div>
                </div>
                <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                    change from below Theme Primary color picker</div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Primary:</p>
                <div class="d-flex flex-wrap align-items-center switcher-style">
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary-1" type="radio"
                            name="theme-primary" id="switcher-primary"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary-2" type="radio"
                            name="theme-primary" id="switcher-primary1"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary-3" type="radio"
                            name="theme-primary" id="switcher-primary2"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary-4" type="radio"
                            name="theme-primary" id="switcher-primary3"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-primary-5" type="radio"
                            name="theme-primary" id="switcher-primary4"> </div>
                    <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                        <div class="theme-container-primary"></div>
                        <div class="pickr-container-primary"></div>
                    </div>
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Background:</p>
                <div class="d-flex flex-wrap align-items-center switcher-style">
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-bg-1" type="radio"
                            name="theme-background" id="switcher-background"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-bg-2" type="radio"
                            name="theme-background" id="switcher-background1"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-bg-3" type="radio"
                            name="theme-background" id="switcher-background2"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-bg-4" type="radio"
                            name="theme-background" id="switcher-background3"> </div>
                    <div class="form-check switch-select me-3"> <input
                            class="form-check-input color-input color-bg-5" type="radio"
                            name="theme-background" id="switcher-background4"> </div>
                    <div
                        class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                        <div class="theme-container-background"></div>
                        <div class="pickr-container-background"></div>
                    </div>
                </div>
            </div>
            <div class="menu-image mb-3">
                <p class="switcher-style-head">Menu With Background Image:</p>
                <div class="d-flex flex-wrap align-items-center switcher-style">
                    <div class="form-check switch-select m-2"> <input
                            class="form-check-input bgimage-input bg-img1" type="radio"
                            name="theme-background" id="switcher-bg-img"> </div>
                    <div class="form-check switch-select m-2"> <input
                            class="form-check-input bgimage-input bg-img2" type="radio"
                            name="theme-background" id="switcher-bg-img1"> </div>
                    <div class="form-check switch-select m-2"> <input
                            class="form-check-input bgimage-input bg-img3" type="radio"
                            name="theme-background" id="switcher-bg-img2"> </div>
                    <div class="form-check switch-select m-2"> <input
                            class="form-check-input bgimage-input bg-img4" type="radio"
                            name="theme-background" id="switcher-bg-img3"> </div>
                    <div class="form-check switch-select m-2"> <input
                            class="form-check-input bgimage-input bg-img5" type="radio"
                            name="theme-background" id="switcher-bg-img4"> </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- End Switcher -->

    <div class="page">
        <!-- app-header -->
           @include('layout.header')
        <!-- /app-header -->


        <!-- Start::app-sidebar -->
          @include('layout.aside')
        <!-- End::app-sidebar -->
    
            <!-- Start::app-content -->
            <div class="main-content app-content">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

       
    @include('layout.script')
    @include('partials.message')
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>        