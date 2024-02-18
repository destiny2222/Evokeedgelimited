@extends('layout.master')
@section('content')
@section('page-title', 'Merchandise Service ')
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
                <form action="{{  route('merchandise.store') }}" method="POST">
                    @csrf
                    <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Description of Item/Product<span class="text-danger">*</span></label>
                            <select name="description" id="" class="form-control" required>
                                <option value="" selected>Choose Item</option>
                                <option value="gadgets">Gadgets</option>
                                <option value="appliances">Appliances</option>
                                <option value="automobile">Automobile</option>
                                <option value="clothes">Clothes & Household Items</option>
                                <option value="jewelries">Jewelries & accessories </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Currency<span class="text-danger">*</span></label>
                            <input type="text" name="currency" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Supplier’s/Seller’s Name<span class="text-danger">*</span></label>
                            <input type="text" name="seller_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email of Supplier<span class="text-danger">*</span></label>
                            <input type="email" name="email_supplier" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Full Name of account holder<span class="text-danger">*</span></label>
                            <input type="text" name="bank_amount_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">IBAN/Account number<span class="text-danger">*</span></label>
                            <input type="number" name="bank_account_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">SWIFT/BIC code<span class="text-danger">*</span></label>
                            <input type="text"  name="bank_swift_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Routing  Number (U.S & CAD only) <span class="text-danger">*</span></label>
                            <input type="number" name="bank_route_number" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="form-label">Reference<span class="text-danger">*</span></label>
                            <input type="text" name="bank_reference_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Recipient address<span class="text-danger">*</span></label>
                            <input type="text" name="recipient" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Country<span class="text-danger">*</span></label>
                            <input type="text" name="country" class="form-control" required>  
                        </div>
                        <div class="form-group">
                            <label class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control" required>  
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Amount<span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4 mb-0 w-75">PROCEED WITH PAYMENT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   
@endsection       