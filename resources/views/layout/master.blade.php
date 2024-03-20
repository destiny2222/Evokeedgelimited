<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="" />
    <link rel="icon" type="image/png" sizes="32x32" href="" />
    <link rel="icon" type="image/png" sizes="16x16" href="" />
    <link rel="mask-icon" href="" color="#083400" />
    <link rel="icon" href="" />
    <link rel="icon" href="" />
    <meta name="msapplication-square150x150logo" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow" />
    <meta property="twitter:account_id" content="1510092490" />
    <meta property="twitter:widgets:csp" content="on" />
    <meta property="twitter:creator" content="" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image:src" content="" />
    <meta property="og:site_name" content="" />
    <meta property="fb:app_id" content="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content=" EvokeEdge LLC | Dashboard" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta name="next-head-count" content="30" />
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">

    <!-- TITLE -->
    <title>EvokeEdge LLC | Dashboard</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assetss/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="/assetss/assets/css/style.css" rel="stylesheet">
   
	<!-- Plugins CSS -->
    <link href="/assetss/assets/css/plugins.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!--- FONT-ICONS CSS -->
    <link href="/assetss/assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="/assetss/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="/assetss/assets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr light-mode">


    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/assetss/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
              @include('layout.app-header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
              @include('layout.app-sidebar')
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="/assetss/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/assetss/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assetss/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="/assetss/assets/js/jquery.sparkline.min.js"></script>

    <!-- Sticky js -->
    <script src="/assetss/assets/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="/assetss/assets/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="/assetss/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="/assetss/assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="/assetss/assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/assetss/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="/assetss/assets/plugins/p-scroll/pscroll.js"></script>
    <script src="/assetss/assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="/assetss/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="/assetss/assets/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="/assetss/assets/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="/assetss/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/assetss/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="/assetss/assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="/assetss/assets/js/apexcharts.js"></script>
    <script src="/assetss/assets/plugins/apexchart/irregular-data-series.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="/assetss/assets/plugins/flot/jquery.flot.js"></script>
    <script src="/assetss/assets/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="/assetss/assets/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="/assetss/assets/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Notifications js -->
    <script src="/assetss/assets/plugins/notify/js/rainbow.js"></script>
    <script src="/assetss/assets/plugins/notify/js/jquery.growl.js"></script>
    <script src="/assetss/assets/plugins/notify/js/notifIt.js"></script>
    @include('partials.notify')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script>
    <!-- INTERNAL Vector js -->
    <script src="/assetss/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assetss/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="/assetss/assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- TypeHead js -->
	<script src="/assetss/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
    <script src="/assetss/assets/js/typehead.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="/assetss/assets/js/index1.js"></script>
     <script src="/assetss/assets/js/widget.js"></script>

    <!-- Color Theme js -->
    <script src="/assetss/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/assetss/assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="/assetss/assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="/assetss/assets/switcher/js/switcher.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
@include('partials.message')
@stack('script')
@stack('scripts')
@stack('charts')
   <!-- SHOW PASSWORD JS -->
   <script src="/assetss/assets/js/show-password.min.js"></script>
<script src="{{ asset('password.js') }}"></script>
    
</body>

</html>