@extends('layout.master')
@section('content')
<div class="container" style="padding-top: 40px">
    

    <div class="d-search shadow-lg p-l-4 p-r-4 p-t-3 p-b-4">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class=" m-b-2 payschool-h1 school-portal">{{  $collegeName }}</h2>    
            </div>
        </div>
        <div class="search-container">
            <form action="{{ route('wire-transferstore') }}" method="post">
                @csrf
                <input type="text"  value="{{  auth()->user()->id }}" hidden name="user_id">
                <input type="text"  value="{{   $collegeName }}" hidden name="college_name">
                <input type="text"  value="{{   $serviceType }}" hidden name="service_type">
               <div class="row">
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_email">Student Email*</label>
                        <input type="email" name="student_email" id="student_email" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_legal_name">Full legal Name*</label>
                        <input type="text" name="legal_name" id="student_legal_name" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_account_number">School Acount Number*</label>
                        <input type="text" name="account_number" id="student_account_number" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_address">School Address *</label>
                        <input type="text" name="school_address" id="student_address" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_iban">School IBAN (Optional)*</label>
                        <input type="text" name="school_iban" id="student_iban" class="applicant-input" >
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_bank_swift_code">School Bank Swift Code</label>
                        <input type="text" name="bank_swift_code" id="student_bank_swift_code" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_routing_number">School Routing Number (For US & Canada Only)*</label>
                        <input type="text" name="routing_number" id="student_routing_number" class="applicant-input" >
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_id_number">Student ID Number*</label>
                        <input type="text" name="student_id" id="student_id_number" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12  col-12 p-t-2">
                        <label for="">Amount</label>
                        <input type="number" name="amount" id="" class="applicant-input" required>
                    </div>
                    <div class="col-lg-12 col-12 text-center">
                        <input type="submit" value="Proceed" class="submit-form w-50 w-100">
                    </div>
               </div>
            </form>
        </div>
        
    </div>
</div>
@endsection