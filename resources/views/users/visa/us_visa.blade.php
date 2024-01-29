@extends('layout.master')
@section('content')
@section('page-title', 'Visa fee')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

    <div class="row justify-content-center">
        <div class="col-md-12 col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">US Visa</h4>
                </div>
                <div class="card-body">
                    <form action="{{  route('application-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="visa_type" value="usa">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="">
                            <div class="form-group">
                                <label for="name_applicant">Name of the Applicant</label>
                                <input type="text" name="name" id="name_applicant" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="visa_website">Case number</label>
                                <input type="nubmer" name="case_number" id="visa_website" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Invoice ID</label>
                                <input type="text" name="invoice_id" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="userpassword">Visa fee amount</label>
                                <input type="nubmer" name="visa_fee_amount" id="userpassword" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Proceed to Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     
@endsection  







