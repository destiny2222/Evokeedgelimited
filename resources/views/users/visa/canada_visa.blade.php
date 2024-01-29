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
                    <h4 class="card-title">Canada Visa</h4>
                </div>
                <div class="card-body">
                    <form action="{{  route('application-store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="visa_type" value="canada">
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Name application</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">User Password</label>
                                <input type="password" class="form-control" name="user_password" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Visa website link</label>
                                <input type="text" class="form-control" name="visa_website_link" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label">Visa fee amount</label>
                                <input type="number" class="form-control" name="visa_fee_amount" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mt-4 mb-0 w-100">Proceed to Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection            