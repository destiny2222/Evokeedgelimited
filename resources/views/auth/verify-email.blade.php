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

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title></title>

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

    <style>
         .logo-login{
            width: 10%;
         }
        @media (max-width: 768px){
            .logo-login{
                width: 30%;
            }
        }
    </style>
</head>

<body class="app sidebar-mini ltr login-img log">


    <div class="page">
        <div class="">
            <!-- Theme-Layout -->


            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <p class="fw-bold">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="fw-bold">{{ __('If you did not receive the email') }}</p>,
                    <form class="login100-form " action="{{  route('verification.send') }}" method="POST">
                        @csrf
                        <div class="submit text-center">
                            <button type="submit" class="btn btn-primary w-100">Resend </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END PAGE -->


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
</body>

</html>