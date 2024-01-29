@extends('layout.master')
@section('content')
@section('page-title', 'Tuition Payment')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('initiator-page') }}" class="btn btn-danger" style="text-decoration:none; background-color:#60002D !important;">
                    <i class="bi bi-arrow-left"></i>                         
                    Go Back  
                </a>
            </div>
            <div class="card-body">
                <div class="panel-group1" id="accordion1">
                    <div class="panel panel-default mb-4">
                        <div class="panel-heading1 ">
                            <h4 class="panel-title1">
                                <a class="accordion-toggle collapsed fs-5" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseFour" aria-expanded="false">
                                    Pay via the school portal    
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <form action="{{ route('store-portal') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Name of College or University*</label>
                                            <input type="text" name="college_name" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Please select the specific service you are paying for</label>
                                            <select  class="form-control select2 form-select" name="service_type" data-placeholder="Choose one" required>
                                                <option label="Choose one"></option>
                                                <option value="Application fee">Application fee</option>
                                                <option value="Tuition deposit">Tuition deposit</option>
                                                <option value="School Residence fees">School Residence fees</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-4 mb-0">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading1">
                            <h4 class="panel-title1">
                                <a class="accordion-toggle collapsed fs-5" data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseFive" aria-expanded="false">
                                    Pay via Wire Transfer
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                            <div class="panel-body">
                                <form action="{{ route('tuition.wire.transfer.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Name of College or University*</label>
                                            <input type="text" name="college_name" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Please select the specific service you are paying for</label>
                                            <select  class="form-control select2 form-select" name="service_type" data-placeholder="Choose one" required>
                                                <option label="Choose one"></option>
                                                <option value="Application fee">Application fee</option>
                                                <option value="Tuition deposit">Tuition deposit</option>
                                                <option value="School Residence fees">School Residence fees</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-4 mb-0" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


