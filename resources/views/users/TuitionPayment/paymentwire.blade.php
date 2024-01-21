@extends('layout.master')
@section('content')

    <div class="container" style="padding-top: 20px">
        <div class="container-item shadow-lg p-r-3 p-l-3 p-b-3 p-t-3">
            <form action="{{  route('wire-transfer-payment') }}" method="post">
                @csrf
                <div id='form'>
                    <div class="slide-one">
                        <h2>Application Fee</h2>
                        <span class='msg' style="color: red; font-size: 13px;"></span>
                        <br>
                        <p>Amount: ${{  number_format( $wiretransfer->amount, 2) }}  </p>
                        <p>EvokeEdge Service fee: {{ $charges->tuition_charge_amount }}% </p>
                        <p>
                            Total amount: 
                            ${{  number_format($totalPay, 2)  }}
                        </p>
                        <div>
                            <button type="button"  class="submit-form w-100 next">Confirm and Continue</button>
                        </div>
                    </div>
                    <input type="text" name="amount" value="{{  number_format( $wiretransfer->amount, 2) }}" hidden id="">
                    <input type="text" name="total" class="total-amount" id="" value="{{  number_format($totalPay, 2)  }}"  hidden> 
                    <input type="text" name="serviceCharge" hidden value="{{ $charges->tuition_charge_amount }}"  hidden  id="">
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
@endsection