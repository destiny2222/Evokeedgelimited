@extends('layout.master')
@section('content')
<div class="flight-container">
    <div class="continer">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="m-b-4 " style="color: #28005F;">Flight Payment</h2>
            </div>
        </div>
        <div class="Flight_payment">
            <form action="/dashboard/flight/pay" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 m-b-4">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" id="" class="applicant-input">
                    </div>
                    <div class="col-lg-6 m-b-4">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" id="" class="applicant-input">
                    </div>
                    <div class="col-lg-6 m-b-4">
                        <label for="">Email Address</label>
                        <input type="email" name="email" id="" class="applicant-input">
                    </div>
                    <div class="col-lg-6 m-b-4">
                        <label for="">Amount</label>
                        <input type="text" name="amount" id="" class="applicant-input">
                    </div>
                    <input type="text" hidden name="ref" id="">
                    <div class="col-lg-6 m-b-4">
                        <label for="">Link of site used for booking:</label>
                        <input type="text" name="bookinglink" id="" class="applicant-input">
                    </div>
                    <div class="col-lg-12">
                        <label for="">Other information (Optional):</label>
                        <input type="text" name="other_information" id="" class="applicant-input">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="submit" class="submit-form w-50 w-100" value="Make Payment">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection       


