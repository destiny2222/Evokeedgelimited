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
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        {{-- <img src="/assets/img/page-title-bg2.jpg" alt="image"> --}}
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">

                                    <h3>Welcome back</h3>
                                    <p>Evoke Edge Limited?</p>

                                    <div class="pt-3 badge  badge-danger" alert="alert">
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <span class="text-danger font-weight-bloder ">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Your email address" class="form-control @error('email')  is-valid  @enderror">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                       
                                        <div class="form-group">
                                            <div class="login-password">
                                                <input type="password" name="password" id="password" placeholder="Your password" class="form-control @error('password') is-valid  @enderror">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="login-password-eye">
                                                    <svg class="close-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                    </svg>
                                                    <svg class="open-eye" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-start mb-3">
                                            <input id="remeber"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label"  for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        
                                        <div class="d-flex justify-content-between flex-warp">
                                            <div class="">
                                                <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a> </p>
                                            </div>
                                            <div class="forgot-password">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>
                                        </div>
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
        <script>
            const Close_eye = document.querySelector(".close-eye");
            const Open_eye = document.querySelector(".open-eye");
            const PasswordIn = document.querySelector("#password");
        
        
        Close_eye.addEventListener('click', function () {
           if (PasswordIn.type === 'password') {
               PasswordIn.type = 'text';
               Close_eye.style.display = 'none';
               Open_eye.style.display = 'block';
           } else {
            PasswordIn.type = 'password';
               Close_eye.style.display = 'block';
               Open_eye.style.display = 'none';
           }
           });
        
           Open_eye.addEventListener('click', function () {
           if (PasswordIn.type === 'text') {
             PasswordIn.type = 'password';
             Close_eye.style.display = 'block';
             Open_eye.style.display = 'none';
           }
        });   
        </script>
    </body>
    @include('partials.message')
</html>