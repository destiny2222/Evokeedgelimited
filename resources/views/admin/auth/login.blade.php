<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login - Admin Dashboard</title>
    <meta name="Description" content="" />
    <meta name="Author" content="" />
    <meta name="keywords" content="" />
    <!-- Favicon -->
    <link rel="icon" href="" type="image/x-icon" />
    <!-- Choices JS -->
    <script src="/vendors/assets/libs/choices.js/public/vendors/assets/scripts/choices.min.js"></script>
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
    <link rel="stylesheet" href="/vendors/assets/libs/choices.js/public/vendors/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="/vendors/assets/libs/jsvectormap/css/jsvectormap.min.css" />
    <link rel="stylesheet" href="/vendors/assets/libs/swiper/swiper-bundle.min.css" />
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js"></script>
    <meta http-equiv="imagetoolbar" content="no" />
    {!! NoCaptcha::renderJs() !!}
</head>


<body class="login-img">

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">
                            Welcome to Admin Dashboard!
                        </p>
                       <form  action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="signin-username" class="form-label text-default">User Name</label>
                                <input type="text" class="form-control form-control-lg @error('field') is-invalid @enderror"  name="field" id="signin-username"
                                    placeholder="user name" />
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-password" class="form-label text-default d-block">
                                    Password
                                    {{-- <a
                                        href="reset-password-basic.html" class="float-end text-danger">Forget password
                                        ?</a> --}}
                                    </label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="signin-password"
                                        placeholder="password" />
                                    <button class="btn btn-light" type="button"
                                        onclick="createpassword('signin-password',this)" id="button-addon2">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <div class="form-group pt-4 ">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block text-danger">
                                                <strong>Please verify that you are not a robot.</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <input type="submit" class="btn btn-lg btn-primary" value="Sign In">
                            </div>
                        </div>
                       </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom-Switcher JS -->
    <script src="/vendors/assets/js/custom-switcher.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/vendors/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Show Password JS -->
    <script src="/vendors/assets/js/show-password.js"></script>
    @include('partials.message')
</body>

</html>
