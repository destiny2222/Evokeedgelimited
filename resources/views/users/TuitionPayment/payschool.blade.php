@extends('layout.master')
@section('content')
<div class="container" style="padding-top: 40px">
    <div class="shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4">
        <div class="row">
            <div class="col-lg-12 m-b-2">
                <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                    <i class="bi bi-arrow-left"></i>                         
                    Go Back  
                </a>
            </div>
            <div class="col-lg-12">
                <h2 class="m-b-4 " style="color: #28005F;">
                    Tuition Payment
                </h2>
            </div>
        </div>
    
        <div class="row">
            <div class="col-12 col-lg-12 ">
                <div class="payvia shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4" id="payvia">
                    <h3>Pay via the school portal</h3>
                </div>
                <div class="school-portal p-b-4" id="portal">
                    <form action="{{ route('store-portal') }}" method="post">
                        @csrf
                        <div class="row">
                             <div class="col-lg-12 col-12 p-t-2">
                                 <label for="student_email">Name of College or University*</label>
                                 <input type="text" name="college_name" id="student_email" class="applicant-input">
                             </div>
                             <div class="col-lg-12 col-12 p-t-2">
                                 <label for="application">Please select the specific service you are paying for</label>
                                 <select name="service_type" id="application" class="applicant-input">
                                     <option value="Application fee">Application fee</option>
                                     <option value="Tuition deposit">Tuition deposit</option>
                                     <option value="School Residence fees">School Residence fees</option>
                                 </select>
                             </div>
                             <div class="col-lg-12 col-12 text-end">
                                 <input type="submit" value="Confirm and Continue" class="submit-form w-50 w-100">
                             </div>
                        </div>
                    </form>
                </div>
                <div class="payvia shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4" id="wiretransfer">
                    <h3>Pay via Wire Transfer </h3>
                </div>
                <div class="school-portal p-b-4" id="wire">
                    <form action="{{ route('wire-transfer-store') }}" method="post">
                        @csrf
                        <div class="row">
                             <div class="col-lg-12 col-12 p-t-2">
                                 <label for="student_email">Name of College or University*</label>
                                 <input type="text" name="college_name" id="student_email" class="applicant-input">
                             </div>
                             <div class="col-lg-12 col-12 p-t-2">
                                 <label for="application">Please select the specific service you are paying for</label>
                                 <select name="service_type" id="application" class="applicant-input">
                                    <option value="Application fee">Application fee</option>
                                    <option value="Tuition deposit">Tuition deposit</option>
                                    <option value="School Residence fees">School Residence fees</option>
                                 </select>
                             </div>
                             <div class="col-lg-12 col-12 text-end">
                                 <input type="submit" value="Confirm and Continue" class="submit-form w-50 w-100">
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script>
       const Payvia = document.querySelector('#payvia');
        const Portal = document.querySelector('#portal');

        Payvia.addEventListener('click', function(e) {
            e.preventDefault();
            if (Portal.style.display === 'none' || Portal.style.display === '') {
                Portal.style.display = 'block';
            } else {
                Portal.style.display = 'none';
            }
        });
    </script>
    <script>
        const Wire = document.querySelector('#wiretransfer');
         const wire = document.querySelector('#wire');
 
         Wire.addEventListener('click', function(e) {
             e.preventDefault();
             if (wire.style.display === 'none' || wire.style.display === '') {
                 wire.style.display = 'block';
             } else {
                 wire.style.display = 'none';
             }
         });
     </script>
@endpush