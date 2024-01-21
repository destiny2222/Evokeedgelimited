<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
    <!-- Include necessary libraries -->

<script>
    // Redirect the user to the payment link
    window.location.href = "{{ $paymentLink }}";

    // Display the checkout modal
    $(document).ready(function () {
        Swal.fire({
            title: 'Complete Payment',
            html: '<p>Please complete your payment in the opened window.</p>',
            icon: 'info',
            confirmButtonText: 'Got it',
            allowOutsideClick: false,
            allowEscapeKey: false,
        });
    });
</script>

</body>
</html>