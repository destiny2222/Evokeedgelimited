@extends('layout.master')
@section('content')
@section('page-title', 'Flight ')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-xl-6">
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
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <div class="deposit-card mb-4">
                                <a href="{{ route('international-flight-page') }}" class="deposit-card-o">
                                    <i class="mdi mdi-airplane-takeoff" style="font-size:16px;color:#fff; display: inline-block;background:#010082;padding:0.83rem 0.7em;border-radius:5px"></i>
                                    <span  class="" style="color: rgb(73, 84, 108); font-size:20px; font-weight:700">International flights</span>
                                </a>
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <div class="deposit-card mb-4">
                                <a href="{{  route('local-flight-page') }}" class="deposit-card-o">
                                    <i class="mdi mdi-airplane-takeoff" style="font-size:16px;color:#fff; display: inline-block;background:#010082;padding:0.83rem 0.7em;border-radius:5px"></i>
                                    <span  class="" style="color: rgb(73, 84, 108); font-size:20px; font-weight:700">Local Flights </span>
                                </a>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>                


@endsection     

