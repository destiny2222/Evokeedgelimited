@extends('layout.master')
@section('content')
@section('page-title', 'Other Services')
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
                <form action="{{ route('otherservice-store') }}" method="POST">
                    @csrf
                    <input type="text" name="user_id" hidden value="{{ auth()->user()->id }}">
                    <div class="">
                        <div class="form-group">
                            <label class="form-label">Reasons for sending funds?</label>
                            <input type="text" name="funds" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Beneficiary Name<span class="text-danger">*</span></label>
                            <input type="text" name="beneficiary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Full Name of account holder<span class="text-danger">*</span></label>
                            <input type="text" name="holder" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">IBAN/Account number<span class="text-danger">*</span></label>
                            <input type="number" name="account_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">SWIFT/BIC code<span class="text-danger">*</span></label>
                            <input type="text" name="swift_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Routing  Number (US & CAD only)<span class="text-danger">*</span></label>
                            <input type="number" name="route_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Reference<span class="text-danger">*</span></label>
                            <input type="text" name="reference_number" class="form-control" required>  
                        </div>
                        <div class="form-group">
                            <label class="form-label"> Amount<span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" id="amount" required>
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