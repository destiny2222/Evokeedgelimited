@extends('layout.master')
@section('content')
    <div class="continer shadow-lg p-l-4 p-r-4 p-t-3 p-b-4" style="padding-top: 50px">
       <div class="row p-b-5">
        <div class="col-lg-12 m-b-2">
            <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                <i class="bi bi-arrow-left"></i>                         
                Go Back  
            </a>
        </div>
           <div class="col-lg-12 col-12">
                <div class="others_serice_payment_title">
                    <h2 class="">
                        Merchandise Payments
                    </h2>
                    <h5>Provide your payment instruction.</h5>
                </div>
           </div>
       </div>
       <div class="row">
            <div class="col-lg-12 col-12">
                <div class="bdc_body ">
                    <div class="bdc_content">
                        <form action="{{ route('merchandise-store') }}" method="POST">
                            @csrf
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Description of Item/Product*</label>
                                        <select name="description" id="" class="applicant-input" required>
                                            <option value="" selected>Choose Item</option>
                                            <option value="gadgets">Gadgets</option>
                                            <option value="appliances">Appliances</option>
                                            <option value="automobile">Automobile</option>
                                            <option value="clothes">Clothes & Household Items</option>
                                            <option value="jewelries">Jewelries & accessories </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Currency*</label>
                                        <input type="text" name="currency" class="applicant-input" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Supplier’s/Seller’s Name*</label>
                                        <input type="text" name="seller_name" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Email of Supplier*</label>
                                        <input type="email" name="email_supplier" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Full Name of account holder*</label>
                                        <input type="text" name="bank_amount_name" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>IBAN/Account number*</label>
                                        <input type="number" name="bank_account_number" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>SWIFT/BIC code*</label>
                                        <input type="text"  name="bank_swift_code" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Routing  Number (U.S & CAD only) *</label>
                                        <input type="number" name="bank_route_number" class="applicant-input" >  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Reference*</label>
                                        <input type="text" name="bank_reference_number" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Recipient address*</label>
                                        <input type="text" name="recipient" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Country*</label>
                                        <input type="text" name="country" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>City*</label>
                                        <input type="text" name="city" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Postcode*</label>
                                        <input type="number" name="postcode" class="applicant-input" required>  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label> Amount*</label>
                                        <input type="number" name="amount" class="applicant-input" required>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{  auth()->user()->id }}">
                                {{-- <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Service Charge*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Total Amount*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ">
                                    <div class="form-body-checkbox">
                                    <input id="confirmPayment" type="checkbox">
                                    <label for="confirmPayment"> Click on the box to confirm your payment details </label> 
                                    </div>
                                </div> --}}
                                <div class="col-lg-12 col-12 ">
                                    <input type="submit" class="submit-form" value="PROCEED WITH PAYMENT">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
@endsection       