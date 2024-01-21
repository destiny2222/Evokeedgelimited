@extends('layout.master')
@section('content')
    <div class="continer p-t-5">
       <div class="card shadow-lg p-l-4 p-t-4 p-r-4 p-b-4">
            <div class="card-body">
                <form action="{{  route('application-store') }}" method="post" class="visa_form">
                    @csrf
                    <input type="hidden" name="visa_type" value="Canada">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="name_applicant">Name  Applicant</label>
                                <input type="text" name="name" id="name_applicant" class="applicant-input">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="applicant-input">
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <label for="visa_website">Visa website link</label>
                                <input type="text" name="visa_website_link" id="visa_website" class="applicant-input">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="userpassword">User Password</label>
                                <input type="password" name="user_password" id="userpassword" class="applicant-input">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label for="visa_fee_amount">Visa fee amount</label>
                                <input type="number" name="visa_fee_amount" id="visa_fee_amount" class="applicant-input">
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