<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content=" ">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="">

    <!-- TITLE -->
    <title>{{  config('app.name' , 'laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/assetss/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="/assetss/assets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="/assetss/assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="/assetss/assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="/assetss/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="/assetss/assets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="/assetss/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <nav class="payment-nav">
                    <div class="back-nav" >
                        <a href="{{ route('deposit-page') }}" class="text-dark btn btn-warning">
                            <span class="back-nav__arrow">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.38065 3.95337L2.33398 8.00004L6.38065 12.0467" stroke="#2D3443" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.6673 8H2.44727" stroke="#2D3443" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            {{-- <span class="back-nav__logo"> --}}
                                Go Back
                            {{-- </span> --}}
                        </a>
                    </div>
                </nav>
                <!-- CONTAINER OPEN -->
                <div class="container mt-5">
                    <div class="row align-items-center ">
                        <div class="col-xl-12 mb-5 text-center">
                            <h2 variant="heavy" class="sc-ftTHFa iCcsoS">Add money via direct debit</h2>
                            <p class="sc-dkrGVk kHcUip subtext">Enter amount you want to add</p>
                        </div>
                        <div class="card  gEtoOE m-auto ">
                            <div class="card-body ">
                                <form action="{{ route('deposit.payment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                                    <label for="" style="font-weight: 500;"> Amount to add </label>
                                    <div class="wrap-input100 validate-input input-group" id="Password-toggle" data-bs-validate="Password is required">
                                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                            <img src="/static/media/NGN-round.44ad12d8.svg" alt="" style="width: 0.9375rem; height: 0.9375rem; display: inline-block; margin-right: 0.28rem;">
                                            <span style="font-weight: 500; color: rgb(82, 95, 122);">NGN</span>
                                        </a>
                                        <input  name="amount" class="input100 border-start-0 ms-0 form-control" value="">
                                    </div>
                                    <div class="sc-jSgvzq sc-Azgjq hsYUSf fDRDgV" >
                                        <div class="sc-jSgvzq MaInI list-item " >
                                            <span>Transaction fee</span>
                                            <span>$0.00</span>
                                        </div>
                                        <div class="sc-jSgvzq MaInI list-item amount" >
                                            <span>Amount you’ll be paying</span>
                                            <span>= $0.00</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class=" bnBVmw">Amount you will receive</label>
                                        <div  class="wrap-input100 validate-input input-group" id="Password-toggle" data-bs-validate="Password is required">
                                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <img src="/static/media/NGN-round.44ad12d8.svg" alt="" style="width: 0.9375rem; height: 0.9375rem; display: inline-block; margin-right: 0.28rem;">
                                                <span style="font-weight: 500; color: rgb(82, 95, 122);">NGN</span>
                                            </a>
                                            <input disabled  tabindex="0" inputmode="none" aria-autocomplete="list" aria-expanded="false" aria-haspopup="true" role="combobox" aria-readonly="true" class="input100 border-start-0 ms-0 form-control" value="">
                                        </div>
                                    </div>
                                    <button type="submit"  class="sc-gswPWN jtxPvF" style="margin-top: 1.5rem;">Make Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End GLOABAL LOADER -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="/assetss/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/assetss/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assetss/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="/assetss/assets/js/show-password.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/assetss/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="/assetss/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/assetss/assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="/assetss/assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="/assetss/assets/switcher/js/switcher.js"></script>
    {{-- @include('partials.message') --}}
    @include('partials.notification')
</body>

</html>