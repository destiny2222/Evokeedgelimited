<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-light">
    
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="EvokeEdge LLC, your trusted provider for comprehensive payment solutions catering to the needs of individuals and businesses in Nigeria.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="innovative,digital,technology,tech,payment,solutions, catering" >
        <meta name="google-site-verification" content="kBzvVl4J539Jh_ylqXHfBilQDJKoPQtNlG2mzwgDdDI" />
        <link rel="shortcut icon" type="image/x-icon" href="https://www.evokeedgelimited.com/assets/img/black-logo.png">
        <meta property="og:image" content="https://www.evokeedgelimited.com/assets/img/black-logo.png" />
        <!-- Links of CSS files -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        {{-- <link rel="stylesheet" href="/assets/css/fontawesome.min.css"> --}}
        <link rel="stylesheet" href="/assets/css/flaticon.css">
        <link rel="stylesheet" href="/assets/css/flaticon1.css">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
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

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="luvion-responsive-nav">
                <div class="container">
                    <div class="luvion-responsive-menu">
                        <div class="logo">
                            <a href="{{ route('home-page') }}">
                                <img src="/assets/img/logo-white.png" class="" alt="logo">
                                <img src="/assets/img/black-logo.png" class="" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="luvion-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="/">
                            <img src="/assets/img/logo-white.png" width="300" class="eek_logo" alt="logo">
                            <img src="/assets/img/black-logo.png" width="300" class="eek_logo" alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="/" class="nav-link active">Home </a></li>
                                <li class="nav-item"><a href="/about" class="nav-link">About Us</a></li>
                                <li class="nav-item"><a href="/service" class="nav-link">Service</a></li>
                                <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                                <li class="nav-item"><a href="/contact" class="nav-link">Contact Us</a></li>
                            </ul>

                            <div class="others-options">
                                <a href="/login" class="login-btn"><i class="flaticon-user"></i> Log In</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area --> 

        @yield('content')

        <!-- Start Footer Area -->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <a href="{{ route('home-page') }}" class="black-logo"><img src="/assets/img/black-logo.png" alt="logo"></a>
                                <a href="{{ route('home-page') }}" class="white-logo"><img src="/assets/img/logo.png" alt="logo"></a> 
                                <p>EvokeEdge Limited, your trusted provider for comprehensive payment solutions catering to the needs of individuals and businesses in Nigeria.</p>
                            </div>
                            
                            <ul class="social-links">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Company</h3>
                            
                            <ul class="list">
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/service">Services</a></li>
                                <li><a href="/blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Support</h3>
                            
                            <ul class="list">
                                <li><a href="/faq">FAQ's</a></li>
                                <li><a href="/policy">Privacy Policy</a></li>
                                <li><a href="/terms">Terms & Condition</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Contact</h3>
                            
                            <ul class="footer-contact-info">
                                <li><span>Location:</span> 8465 Keystone Crossing, suite 115, Indianapolis, IN, USA.</li> 
                                <li><span>Email:</span> <a href=""><span>sales@evokeedgelimited.com</span></a></li>
                                {{-- <li><span>Phone:</span> <a href="tel:+2348143980684">+234 814 398 0684</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <p>&copy; <script>document.write(new Date().getFullYear())</script> EvokeEdge LLC. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class="fas fa-arrow-up"></i></div>

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
<script src="/assets/js/script.js"></script>
@include('partials.message')
</body>
</html>