@extends('layout.master')
@section('content')
@section('page-title', 'Tuition Payment')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">{{   $tuition->college_name }}</h4>
            </div>
            <div class="card-body">
                <h4 class="mb-4 text-center">Provide login details we can use to access your school’s portal to complete the payment</h4>
                
                <form action="{{ route('tuition.wire.store') }}" method="post">
                    @csrf
                    <input type="text"  value="{{  auth()->user()->id }}" hidden name="user_id">
                    <input type="text"  value="{{  $tuition->college_name }}" hidden name="college_name">
                    <input type="text"  value="{{  $tuition->service_type }}" hidden name="service_type">
                    <input type="text"  value="Tuition Payment" hidden name="type">
                   <div class="row">
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_email" class="form-label">Student Email*</label>
                            <input type="email" name="student_email" id="student_email" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_legal_name">Full legal Name*</label>
                            <input type="text" name="legal_name" id="student_legal_name" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_account_number" class="form-label">School Acount Number*</label>
                            <input type="text" name="account_number" id="student_account_number" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_address" class="form-label">School Address *</label>
                            <input type="text" name="school_address" id="student_address" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_iban" class="form-label">School IBAN (Optional)*</label>
                            <input type="text" name="school_iban" id="student_iban" class="form-control" >
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_bank_swift_code" class="form-label">School Bank Swift Code</label>
                            <input type="text" name="bank_swift_code" id="student_bank_swift_code" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_routing_number" class="form-label">School Routing Number (For US & Canada Only)*</label>
                            <input type="text" name="routing_number" id="student_routing_number" class="form-control" >
                        </div>
                        <div class="col-lg-12 col-12 mb-4">
                            <label for="student_id_number" class="form-label">Student ID Number*</label>
                            <input type="text" name="student_id" id="student_id_number" class="form-control" required>
                        </div>
                        <div class="col-lg-12  col-12 mb-4">
                            <label for="" class="form-label">Amount</label>
                            <input type="number" name="amount" id="" class="form-control" required>
                        </div>
                        <div class="col-lg-12 col-12 text-center mt-3">
                            <input type="submit" value="Proceed" class="btn btn-primary  w-100">
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection