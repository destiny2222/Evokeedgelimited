@extends('layout.master')
@section('content')
@section('page-title', 'Corporate Service ')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <a href="{{ route('initiator-page') }}" class="btn btn-warning" style="text-decoration:none;">
                            <i class="bi bi-arrow-left"></i>                         
                            Go Back  
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{  route('store-page') }}" method="POST">
                        @csrf
                        <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBankName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" id="exampleInputBankName" placeholder="Enter Bank Name">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputAccount">Account Number</label>
                                <input type="number" class="form-control" name="bank_account_number" id="exampleInputAccount" placeholder="Account Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress" class="form-label">Bank Address</label>
                                <input type="text" class="form-control" name="bank_address" id="exampleInputAddress"  placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress" class="form-label">Bank Address</label>
                                <input type="text" class="form-control" name="bank_address" id="exampleInputAddress"  placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="exampleInputSwift">Swift Code</label>
                                <input type="text" class="form-control" name="bank_swift_code" id="exampleInputSwift" placeholder="code">
                            </div>
                            <div class="form-group">
                                <label class="form-label" id="exampleInputamount">Amount</label>
                                <input type="number" class="form-control" name="amount" id="exampleInputamount" placeholder="Amount">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary mt-4 mb-0 w-75" style="text-transform: capitalize">PROCEED WITH PAYMENT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection       
