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
                    <a href="{{ route('initiator-page') }}" class="btn btn-danger ps-3" style="text-decoration:none; background-color:#60002D !important;">
                        <i class="bi bi-arrow-left"></i>                         
                        Go Back  
                    </a>
                    <h4 class="card-title text-center ps-3">{{   $portal->college_name }}</h4>
                </div>
                <div class="card-body">
                    <h4 class="mb-4 text-center">Provide login details we can use to access your school’s portal to complete the payment</h4>
                    
                    <form  action="{{ route('portal.tuiton') }}" method="POST">
                        @csrf
                        <input type="text"  value="{{  $portal->user_id }}" hidden name="user_id">
                        <input type="text"  value="{{  $portal->college_name }}" hidden name="college_name">
                        <input type="text"  value="{{  $portal->service_type }}" hidden name="service_type">
                        <input type="text"  value="Tuition Payment" hidden name="type">
                        
                        <div class="">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Full legal name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="legal_name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Student email*</label>
                                <input type="email" name="student_email" class="form-control" id="exampleInputEmail1" placeholder="Student email" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Portal link</label>
                                <input type="text" name="portal_link" class="form-control" id="exampleInputEmail1" placeholder="Portal Link">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Student ID Number</label>
                                <input type="text" name="student_id" class="form-control" id="exampleInputEmail1" placeholder="Student Id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Portal Password</label>
                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                        <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="input100 border-start-0 ms-0 form-control" name="portal_password" required type="password" placeholder="Portal Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Amount</label>
                                <input type="number" name="amount" id=""  class="form-control">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-4 mb-0" type="submit">Proceed to payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>

       
</div>
    
@endsection

@push('scripts')

@endpush