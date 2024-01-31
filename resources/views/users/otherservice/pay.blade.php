@extends('layout.payment-layout')
@section('payment-content')
<div class="">
    <!-- Theme-Layout -->

    <nav class="payment-nav">
        <div class="back-nav" >
            <a href="{{ route('otherservice.pay') }}" class="text-dark btn btn-warning">
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
            <div class="d-flex overflow justify-content-center">
                <div class="active pay-tuition">
                    <div class="mb-5 text-center">
                        <h2 variant="heavy" class="sc-ftTHFa iCcsoS">Application Fee</h2>
                        <p class="sc-dkrGVk kHcUip subtext">Enter amount you want to add</p>
                    </div>
                    <div class="card  gEtoOE m-auto" style="h-50">
                        <div class="card-body">
                            <div class="">
                                <br>
                                <p>Amount: ${{ number_format($pay->amount, 2) }} </p>
                                <p>EvokeEdge Service fee: {{ $charge->other_service }}%</p>
                                <p>Total amount: <span id="total">${{ number_format($pay->total_amount, 2)  }}</span></p>
                                <div>
                                    <button type="button"  class="btn-primary btn w-100 next">Confirm and Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pay-tuition" id="pay2">
                    <div class="row">
                        <div class="col-xl-12 mb-5 text-center">
                            <h2 variant="heavy" class="sc-ftTHFa iCcsoS">Make Payment</h2>
                            <p class="sc-dkrGVk kHcUip subtext">Payment Option</p>
                        </div>
                    </div>
                    <div class="card  gEtoOE m-auto"  style="h-50">
                        <div class="card-body">
                            <div class=" " >
                                <form action="{{  route('merchandise.payment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
                                    <input type="hidden" name="amount"   value="{{ $pay->total_amount  }}">
                                    <p class="sc-dkrGVk kHcUip" style="color: rgb(73, 84, 108);">Select your choice</p>
                                    <div class="deposit-card mb-4">
                                        <div class="">
                                            <label class="pt-1">
                                                <input type="radio"  name="paymentMethod" value="balance"><span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="deposit-card-o ">
                                            <img src="/assetss/assets/images/payments/directdebit-dark.svg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                                            <p  class="pt-4" style="color: rgb(73, 84, 108);">Account Balance ${{ number_format($wallet  ?  $wallet->amount : 0, 2)  }}</p>
                                        </div>
                                    </div>
                                    <div class="deposit-card mb-4 ">
                                        <div class="">
                                            <label class="pt-1">
                                                <input type="radio" name="paymentMethod"  value="visa"><span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="deposit-card-o align-items-center">
                                            <img src="/assetss/assets/images/payments/visa-dark.svg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                                            <p  class="pt-4" style="color: rgb(73, 84, 108);">Local online bank</p>
                                        </div>
                                    </div>
                                    <button type="submit"  class="sc-gswPWN jtxPvF" style="margin-top: 1.5rem;">Make Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
</div>
@endsection