@extends('layout.master-2')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Grid Card -->
        <div class="row">
            <div class="col-xl">
                <h6 class="pb-1 mb-4 text-muted">Service</h6>
            </div>
            <div class=" text-end">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTop">
                    Enable/Disable Service
                </button>
            </div>
        </div>
      
        <div class="row">
           
            <div class="col-lg-3 col-12">
                <div class="card custom-card">
                    @if ($setting)
                        <div class="card-header justify-content-between">
                            <div class="card-title"> 
                                Enable/Disable Service 
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-visa" disabled  {{ $setting->visa ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-visa">Visa Fee</label> 
                            </div>
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-flight_booking" disabled {{  $setting->flight_booking ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-flight_booking">Flight Booking</label> 
                            </div>
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-tuition" disabled {{  $setting->tuition_payment ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-tuition">Tuition Payment</label> 
                            </div>
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-corporate" disabled {{  $setting->corporate_service ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-corporate">Corporate Service</label> 
                            </div>
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-merchandise" disabled {{  $setting->merchandise_payment ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-merchandise">Merchandise Payment</label> 
                            </div>
                            <div class="form-check form-switch mb-2"> 
                                <input class="form-check-input" type="checkbox" role="switch" id="switch-merchandise" disabled {{  $setting->merchandise_payment ? 'checked' : '' }}> 
                                <label class="form-check-label" for="switch-merchandise">Other Service</label> 
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('admin.feature.disable')
@endsection


