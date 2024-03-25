@extends('layout.payment-layout')
@section('payment-content')
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
        <div class="row align-items-center mb-5">
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
                                <img src="{{ asset('assetss/assets/images/flags-svg/us.svg') }}" alt="" style="width: 0.9375rem; height: 0.9375rem; display: inline-block; margin-right: 0.28rem;">
                                <span style="font-weight: 500; color: rgb(82, 95, 122);">USD</span>
                            </a>
                            <input type="number" id="amount" oninput="updateFee()" name="amount" class="input100 border-start-0 ms-0 form-control" oninput="displayInput()">
                        </div>
                        <div class="sc-jSgvzq sc-Azgjq hsYUSf fDRDgV" >
                            <div class="sc-jSgvzq MaInI list-item " >
                                <span>Transaction fee</span>
                                <span>${{ number_format($chargefee->deposit_charge, 2) }}</span>
                                <input hidden type="text" id="fee" value="{{ $chargefee->deposit_charge }}">
                            </div>
                        </div>
                        <div>
                            <label class=" bnBVmw">Amount you will receive</label>
                            <div  class="wrap-input100 validate-input input-group" id="Password-toggle" data-bs-validate="Password is required">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <img src="{{ asset('assetss/assets/images/flags-svg/us.svg') }}" alt="" style="width: 0.9375rem; height: 0.9375rem; display: inline-block; margin-right: 0.28rem;">
                                    <span style="font-weight: 500; color: rgb(82, 95, 122);">USD</span>
                                </a>
                                <input type="text" readonly  id="input2"  value="" class="input100 border-start-0 ms-0 form-control">
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
@endsection