

@extends('layout.master')
@section('content')
    {{-- <div class="continer p-t-5">
         <div class="row">
              <div class="col-lg-10 col-12">
                <div class="card shadow-lg p-l-4 p-t-4 p-r-4 p-b-4">
                    <div class="card-body">
                        @if ($visaApplication)
                        <p class="pay_p">Service Fee: <span  class="visa_span">{{  $charge->visa_charge_amount }}%</span></p>
                        <p class="pay_p">Total Charge: <span  class="visa_span">${{ number_format( $visaApplication->total_charge, 2) }}</span></p>
                        @endif
                        <form action="{{  route('initiate-page') }}" method="post" class="visa_form">
                            @csrf
                            <input type="text" hidden name="total" value="{{ number_format( $visaApplication->total_charge, 2) }}" id="">
                            <div>
                                <label for="payment_option">Select Payment Option:</label>
                               <ul class="card-payment-ul">
                                        <li class="card-payment d-flex gap-3 m-b-1">
                                            <input id="payment_method_balance" type="radio" class="input-radio" name="payment_option" value="balance">
                                            <label class="" for="payment_method_balance">
                                                 Make payment with Balance: ${{ number_format(auth()->user()->userwallet->amount,2 ) }}
                                            </label>
                                        </li>
                                        <li class="card-payment d-flex m-b-1">
                                            <input id="payment_method_local" type="radio" class="input-radio" name="payment_option" value="debit">
                                            <label class="" for="payment_method_local">
                                                DIRECT BANK TRANSFER
                                            </label>
                                        </li>
                                        <li class="card-payment m-b-1">
                                            <input id="payment_method_paystack" type="radio" class="input-radio" name="payment_option" value="payment">
                                            <label class="" for="payment_method_paystack">
                                                <img width="100" src="{{ asset('visa.png') }}" alt="">
                                            </label>  
                                        </li>
                                    </ul>
                            </div>
                            <div>
                                <input type="submit"  value="Pay Now" class="submit-form  w-100">
                            </div>
                        </form>
                    </div>
               </div>
              </div>
         </div>
    </div> --}}
    <div class="container" style="padding-top: 20px">
        <div class="container-item shadow-lg p-r-3 p-l-3 p-b-3 p-t-3">
            <form action="{{  route('initiate-page') }}" method="post">
                @csrf
                
                <div id='form'>
                    <div class="slide-one">
                        @if ($visaApplication)
                            <h2>Application Fee</h2>
                            <span class='msg' style="color: red; font-size: 13px;"></span>
                            <br>
                            <p>Amount: ${{ number_format($visaApplication->visa_fee_amount, 2) }} </p>
                            <p>EvokeEdge Service fee: {{ $charge->visa_charge_amount }}%</p>
                            <p>Total amount: <span >${{ number_format( $visaApplication->total_charge, 2) }}</span></p>
                        @endif
                        <div>
                            <button type="button"  class="submit-form w-100 next">Confirm and Continue</button>
                        </div>
                        
                    </div>
                    <input type="text" hidden  class="total-amount" name="total" value="{{ number_format( $visaApplication->total_charge, 2) }}" id="">
                    <div class="slide-two">
                        <span class='msg2' style="color: red; font-size: 13px;"></span><br>
                        <p id='back'><i class="fa fa-arrow-left"></i> <span id='name' style="color: #383838;"></span></p><br>
                        <div class="container">
                            <div class="row m-b-4">
                               <div class="col-lg-12">
                                    <h3>Payment Option</h3>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="card-payment-ul">
                                        <li class="card-payment d-flex gap-3 m-b-1">
                                            <input id="payment_method_balance" type="radio" class="input-radio" name="paymentMethod" value="balance">
                                            <label class="" for="payment_method_balance">
                                                 Make payment with Balance: ${{ number_format(auth()->user()->userwallet->amount,2 ) }}
                                            </label>
                                        </li>
                                        {{-- <li class="card-payment d-flex m-b-1">
                                            <input id="payment_method_local" type="radio" class="input-radio" name="paymentMethod" value="debit">
                                            <label class="" for="payment_method_local">
                                                DIRECT BANK TRANSFER
                                            </label>
                                        </li> --}}
                                        <li class="card-payment m-b-1">
                                            <input id="payment_method_paystack" type="radio" class="input-radio" name="paymentMethod" value="visa">
                                            <label class="" for="payment_method_paystack">
                                                <img width="100" src="{{ asset('visa.png') }}" alt="">
                                            </label>  
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-12 text-center">
                                    <input type="submit" value="Proceed to payment" class="submit-form  w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>

        var next = document.querySelector('.next');
        var slide_one = document.querySelector('.slide-one');
        var slide_two = document.querySelector('.slide-two');
    
        var email = document.querySelector('.total-amount')
        // var nameText = document.getElementById('name')
        var back_btn = document.getElementById('back')
        var msg = document.querySelector('.msg')
        var msg2 = document.querySelector('.msg2')
    
        // var container_item_2 = document.querySelector('.container-item-2')
        
        next.addEventListener('click', function () {
            if (email.value == "") {
                msg.textContent = 'Enter a valid email address, phone number, or Skype name.'
            } else {
                msg.textContent = ""
                // nameText.textContent = email.value
                slide_one.classList.add('slide-one-toggle')
                slide_two.classList.add('slide-two-toggle')
            }
        })
        back_btn.addEventListener('click', function () {
            slide_one.classList.remove('slide-one-toggle')
            slide_two.classList.remove('slide-two-toggle')
        });
    
        document.addEventListener('DOMContentLoaded', function() {
            var amount = parseFloat(document.querySelector('input[name="amount"]').value);
            var serviceCharge = parseFloat(document.querySelector('input[name="serviceCharge"]').value);
            var total = amount + serviceCharge;
            document.getElementById('total').value = total;
        });
    
    
        document.querySelector('form').addEventListener('submit', function(event) {
          var selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
          document.querySelector('input[name="paymentMethod"]').value = selectedPaymentMethod;
        });
     
    
       
    </script>
@endsection            