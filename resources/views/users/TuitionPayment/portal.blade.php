@extends('layout.master')
@section('content')
<div class="container" style="padding-top: 40px">
    

    <div class="d-search shadow-lg p-l-4 p-r-4 p-t-3 p-b-4">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class=" m-b-2 payschool-h1 school-portal">
                    {{   $collegeName }}
                </h2>    
            </div>
        </div>
        
        <div class="search-container">
            <form action="{{ route('portal-tuiton') }}" method="POST">
                @csrf
                <input type="text"  value="{{  auth()->user()->id }}" hidden name="user_id">
                <input type="text"  value="{{   $collegeName }}" hidden name="college_name">
                <input type="text"  value="{{   $serviceType }}" hidden name="service_type">
               <div class="row">
                    <h4>Provide login details we can use to access your school’s portal to complete the payment</h4>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="legal">Full legal name </label>
                        <input type="text" name="legal_name" id="legal" placeholder="Full Name" class="applicant-input">
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_email">Student email*</label>
                        <input type="email" name="student_email" id="student_email" class="applicant-input">
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="portal_link">Portal link</label>
                        <input type="text" name="portal_link" id="portal_link" class="applicant-input">
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="student_id">Student ID Number</label>
                        <input type="text" name="student_id" id="student_id" class="applicant-input">
                    </div>
                    <div class="col-lg-12 col-12 p-t-2">
                        <div class="form-group" style="position: relative">
                            <label for="portal_link">Portal Password</label>
                            <input type="password" name="portal_password" id="portal_password" class="applicant-input">
                        </div>
                        <span class="password-toggle" id="password-toggle" onclick="togglePasswordVisibility()">&#128065;</span>
                    </div>                                      
                    <div class="col-lg-12 col-12 p-t-2">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="applicant-input">
                    </div>
                    <div class="col-lg-12 col-12 text-center">
                        <input type="submit" value="Proceed to payment" class="submit-form w-50 w-100">
                    </div>
               </div>
            </form>
        </div>
        
    </div>
</div>
    
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("portal_password");
        const passwordToggle = document.getElementById("password-toggle");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML = "&#128064;"; // Change to the crossed eye icon
        } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML = "&#128065;"; // Change back to the eye icon
        }
    }
</script>

@endpush