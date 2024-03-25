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
            @yield('payment-content')
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
    @include('partials.message')
    {{-- <script>
        function getVal() {
            var amountInput = parseFloat(document.getElementById('amount').value);
            var totalAmount = parseFloat(document.getElementById('fee').value);
    
            
            if (!isNaN(amountInput) && !isNaN(totalAmount)) {
                document.getElementById("input2").value = (amountInput + totalAmount).toFixed(2);
            } else {
                document.getElementById("input2").value = ''; 
            }
        }
    </script> --}}
    
    <script>
        function updateFee() {
            var amountInput = parseFloat(document.getElementById('amount').value);
            var feeAmount = parseFloat(document.getElementById('fee').value);
    
            // Check if the amount input is a valid number
            if (!isNaN(amountInput)) {
                document.getElementById("input2").value = (amountInput + feeAmount).toFixed(2);
            } else {
                document.getElementById("input2").value = ''; 
            }
        }
    </script>
    <script>
        var paymentBody = document.querySelector(".pay-tuition");
        var formButton = document.querySelector(".next");
        var form2 = document.querySelector("#pay2");
        var back_btn = document.getElementById('back')


        formButton.addEventListener("click", function(e) {
            e.preventDefault();
            paymentBody.classList.remove('active')
            form2.classList.add('active');
        });

        back_btn.addEventListener('click', function () {
            slide_one.classList.remove('slide-one-toggle')
            slide_two.classList.remove('slide-two-toggle')
        });
    </script>
</body>

</html>