@extends('layout.master')
@section('content')
    <div class="continer">
        <div class="row">
            <div class="col-lg-12 m-b-2">
                <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                    <i class="bi bi-arrow-left"></i>                         
                    Go Back  
                </a>
            </div>
        </div>
        
       <div class="shadow-lg p-l-3 p-t-3 p-r-3 p-b-3">
        <div class="row">
            <div class="col-lg-12 col-12 ">
                <h2 class="m-b-4 " style="color: #28005F;">Corporate Service</h2>
            </div>
            <div class="col-lg-12 col-12">
                <div class="bdc_body">
                    <div class="bdc_content">
                            <form action="{{  route('store-page') }}" method="POST">
                                @csrf
                                <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                                <div class="col-lg-6 col-12 m-b-4 p-t-2 ">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" class="applicant-input" name="name" id="exampleInputName" placeholder="Enter your name">
                                </div>
                    
                                <div class="col-lg-6 col-12 m-b-4 p-t-2">
                                    <label for="exampleInputBankName" class="form-label">Bank Name</label>
                                    <input type="text" class="applicant-input" name="bank_name" id="exampleInputBankName" placeholder="Enter Bank Name">
                                </div>
                    
                                <div class="col-lg-6 col-12 m-b-4 p-t-2">
                                    <label class="form-label" for="exampleInputAccount">Account Number</label>
                                    <input type="number" class="applicant-input" name="bank_account_number" id="exampleInputAccount" placeholder="Account Number">
                                </div>
                    
                                <div class="col-lg-6 col-12 m-b-4 p-t-2">
                                    <label for="exampleInputAddress" class="form-label">Bank Address</label>
                                    <input type="text" class="applicant-input" name="bank_address" id="exampleInputAddress"  placeholder="Address">
                                </div>
                    
                                <div class="col-lg-6 col-12 m-b-4 p-t-2">
                                    <label class="form-label" for="exampleInputSwift">Swift Code</label>
                                    <input type="text" class="applicant-input" name="bank_swift_code" id="exampleInputSwift" placeholder="code">
                                </div>
                    
                                <div class="col-lg-6 col-12 m-b-4 p-t-2">
                                    <label class="form-label" id="exampleInputamount">Amount</label>
                                    <input type="number" class="applicant-input" name="amount" id="exampleInputamount" placeholder="Amount">
                                </div>
                                <div class="col-lg-12  col-12 m-b-4">
                                    <div class="text-center">
                                        <input type="submit"  class="submit-form " class="w-100 w-50" value="Submit">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
      </div>
       </div>
    </div>
@endsection       
