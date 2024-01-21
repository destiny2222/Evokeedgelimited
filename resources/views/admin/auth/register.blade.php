<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register - Admin Dashboard</title>
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
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">
                            Welcome to Admin Dashboard!
                        </p>
                        <form action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12 mb-2"> 
                                    <label for="signup-firstname" class="form-label text-default">Full Name</label> 
                                    <input type="text" name="name" class="form-control form-control-lg" id="signup-firstname" placeholder="full name"> 
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="email"  class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control form-control-lg" id="email" placeholder="Email Address" />
                                  </div>
                                <div class="col-xl-12 mb-2"> 
                                    <label for="signup-lastname" class="form-label text-default">Phone</label> 
                                    <input type="number" name="phone" class="form-control form-control-lg" id="signup-lastname" placeholder="Phone number"> 
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="phone"  class="form-label">Role</label>
                                    <select name="role_as" id="" class="form-control form-control-lg">
                                        <option value="" selected>Select</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="employee">Employee</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <div class="col-xl-12 mb-2"> 
                                    <label for="signup-password" class="form-label text-default">Password</label>
                                    <div class="input-group"> 
                                        <input type="password" name="password" class="form-control form-control-lg" id="signup-password" placeholder="password"> 
                                        <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-2"> 
                                    <label for="signup-confirmpassword" class="form-label text-default">Confirm Password</label>
                                    <div class="input-group"> 
                                        <input type="password" name="confirm_password" class="form-control form-control-lg" id="signup-confirmpassword" placeholder="confirm password"> 
                                        <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button"
                                            id="button-addon21"><i class="ri-eye-off-line align-middle"></i>
                                        </button>
                                    </div>
                                   
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button class="btn btn-lg btn-primary">Create Account</button>
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