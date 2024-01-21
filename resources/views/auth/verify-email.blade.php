<!doctype html>
<html lang="zxx" class="theme-light">
    
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="/assets/css/flaticon.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="/assets/css/nice-select.css">
        <link rel="stylesheet" href="/assets/css/slick.min.css">
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/assets/css/meanmenu.css">
		<link rel="stylesheet" href="/assets/css/odometer.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/responsive.css">
        <link rel="stylesheet" href="/assets/css/dark-style.css">

        <title>EvokeEdge Limited</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

        <!-- Preloader -->
        {{-- <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div> --}}
        <!-- End Preloader -->

        <!-- Start Login Area -->
        <section class="login-area">
            <div class="row m-0">
                <div class="col-lg-12 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell text-center">
                                <h3 class="tp-login-title">{{ __('Verify Your Email Address') }}</h3>
                                
                                <div class="login-form">
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
                                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                                    <p>{{ __('If you did not receive the email') }}</p>,
                                    <form action="{{  route('verification.send') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Resend </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->

        <!-- Dark/Light Toggle -->
		<!-- <div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div> -->

        <!-- Links of JS files -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/meanmenu.js"></script>
        <script src="/assets/js/nice-select.min.js"></script>
        <script src="/assets/js/slick.min.js"></script>
        <script src="/assets/js/magnific-popup.min.js"></script>
		<script src="/assets/js/appear.min.js"></script>
        <script src="/assets/js/odometer.min.js"></script>
        <script src="/assets/js/owl.carousel.min.js"></script>
        <script src="/assets/js/parallax.min.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/form-validator.min.js"></script>
        <script src="/assets/js/contact-form-script.js"></script>
        <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="/assets/js/main.js"></script>
    </body>

</html>