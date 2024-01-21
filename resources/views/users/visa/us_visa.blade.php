@extends('layout.master')
@section('content')
    <div class="continer p-t-5">
        <div class="card  shadow-lg p-l-4 p-t-4 p-r-4 p-b-4">
            <div class="card-body">
                <form action="{{ route('application-store') }}" id="your-form-id" method="post" class="visa_form">
                    @csrf
                    <input type="hidden" name="visa_type" value="usa">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="name_applicant">Name of the Applicant</label>
                                <input type="text" name="name" id="name_applicant" class="applicant-input" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="visa_website">Case number</label>
                                <input type="nubmer" name="case_number" id="visa_website" class="applicant-input" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="username">Invoice ID</label>
                                <input type="text" name="invoice_id" id="username" class="applicant-input" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="userpassword">Visa fee amount</label>
                                <input type="nubmer" name="visa_fee_amount" id="userpassword" class="applicant-input" required>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="text-center">
                            <button type="submit" class="submit-form w-50 w-100">Proceed to Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection  







