@extends('layout.master')
@section('content')
@section('page-title', 'Visa fee')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->
<div class="row justify-content-center">
    <div class="col-md-12 col-xl-6">
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
                <h3 class="py-2 text-center">Select country of choice</h3>
                <div class="visa_fee">
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <div class="deposit-card mb-4">
                                <div class="">
                                    <label class="pt-1">
                                        <input type="radio"  name="selected" value="canada">
                                        <span class="checkmark" style="display: none"></span>
                                    </label>
                                </div>
                                <div class="deposit-card-o">
                                    <img src="/assetss/assets/images/flags-svg/ca.svg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                                    <span  class="" style="color: rgb(73, 84, 108);">Canada</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <div class="deposit-card mb-4">
                                <div class="">
                                    <label class="pt-1">
                                        <input type="radio"  name="selected" value="united_state">
                                        <span class="checkmark" style="display: none"></span>
                                    </label>
                                </div>
                                <div class="deposit-card-o">
                                    <img src="/assetss/assets/images/flags-svg/us.svg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                                    <span  class="" style="color: rgb(73, 84, 108);">United States</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <div class="deposit-card mb-4">
                                <div class="">
                                    <label class="pt-1">
                                        <input type="radio"  name="selected" value="online-transfer">
                                        <span class="checkmark" style="display: none"></span>
                                    </label>
                                </div>
                                <div class="deposit-card-o">
                                    <img src="/assetss/assets/images/flags-svg/um.svg" alt="" style="width: 2.25rem; height: 1.30rem; display: inline-block;">
                                    <span  class="" style="color: rgb(73, 84, 108);">United Kingdom</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="text-center">
                        <button id="submit" class="btn btn-primary w-75 mt-4 mb-0" disabled>click here to continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection
@push('scripts')   
<script>
    $(document).ready(function() {
        $('input[type="radio"][name="selected"]').on('click', function() {
            $('.deposit-card').removeClass('clicked');
            $(this).closest('.deposit-card').addClass('clicked');
        });
    });
  </script>   
    <script>
        const checkboxes = document.querySelectorAll('input[name="selected"]');
        const submit = document.querySelector('#submit');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', function(e) {
                if (checkbox.checked) {
                    submit.disabled = false;
                } else {
                    submit.disabled = true;
                }
            });
        });

        submit.addEventListener('click', function(e) {
            if (submit.disabled) {
                e.preventDefault(); 
            } else {
                var selectedPaymentMethod = document.querySelector('input[name="selected"]:checked').value;
                if (selectedPaymentMethod === 'canada') {
                    window.location.href = "/dashboard/canada_visa";
                } else if (selectedPaymentMethod === 'united_state') {
                    window.location.href = "/dashboard/us_visa";
                }
            }
        });
   </script>
@endpush
  