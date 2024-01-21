@extends('layout.master')
@section('content')
<div class="flight-container">
    <div class="continer">
        <div class="row">
            <div class="col-lg-12 m-b-2">
                <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                    <i class="bi bi-arrow-left"></i>                         
                    Go Back  
                </a>
            </div>
            <div class="col-lg-12">
                <h2 class="m-b-4 " style="color: #28005F;">
                    Flight Booking
                </h2>
            </div>
        </div>

         <div class="row">
        <div class="col-12 col-lg-12">
            <a href="{{ route('international-flight-page') }}"  id="payvia" class="text-decoration-none">
                <div class="payvia shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4">
                    <h3>International flights</h3>
                </div>
            </a>
            <a  href="{{  route('local-flight-page') }}" id="wiretransfer" class="text-decoration-none">
                <div class="payvia shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4">
                    <h3>Local Flights </h3>
                </div>
            </a>
        </div>
    </div>
    </div>
</div>

@endsection     

@push('scripts')
    
@endpush


