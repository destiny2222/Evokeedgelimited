@extends('layout.master')
@section('content')
    <div class="continer shadow-lg p-l-3 p-r-3 p-t-3 p-b-4">
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
                        </span>
                        Other Services Payments 
                    </h2>
                    <h5>Provide your payment intructionss.</h5>
                </div>
           </div>
       </div>
       <div class="row">
            <div class="col-lg-12 col-12">
                <div class="bdc_body ">
                    <div class="bdc_content">
                            <form action="{{ route('otherservice-store') }}" method="POST">
                                @csrf
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Reasons for sending funds?</label>
                                        <input type="text" name="funds" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Beneficiary Name*</label>
                                        <input type="text" name="beneficiary" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Full Name of account holder*</label>
                                        <input type="text" name="holder" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>IBAN/Account number*</label>
                                        <input type="number" name="account_number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>SWIFT/BIC code*</label>
                                        <input type="text" name="swift_code" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Routing  Number (US & CAD only)*</label>
                                        <input type="number" name="route_number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Reference*</label>
                                        <input type="text" name="reference_number" class="applicant-input">  
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label> Amount*</label>
                                        <input type="number" name="amount" class="applicant-input" id="amount">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-12" id="chargeDiv" style="display:none;">
                                    <div class="form-group">
                                        <label>Service Charge*</label>
                                        <input type="number" value="{{ $charges->other_service  }}" readonly class="applicant-input" id="charge" oninput="calculate()">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12" id="totalDiv" style="display:none;">
                                    <div class="form-group">
                                        <label>Total Amount*</label>
                                        <input type="number" name="total_amount" class="applicant-input" id="total" readonly>
                                    </div>
                                </div> --}}
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                {{-- <div class="col-lg-12 col-12 ">
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

@push('scripts')
<script>
    function calculate() {
        var amount = parseFloat(document.getElementById("amount").value) || 0;
        var charge = parseFloat(document.getElementById("charge").value) || 0;
        var total = amount + charge;
        document.getElementById("total").value = total;
        
        if (amount) {
            document.getElementById("chargeDiv").style.display = "block";
            document.getElementById("totalDiv").style.display = "block";
        } else {
            document.getElementById("chargeDiv").style.display = "none";
            document.getElementById("totalDiv").style.display = "none";
        }
    }
</script>
    
@endpush