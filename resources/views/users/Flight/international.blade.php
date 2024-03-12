@extends('layout.master')
@section('content')
@section('page-title', 'Flight ')
<!-- PAGE-HEADER -->
@include('layout.page-header')
<!-- PAGE-HEADER END -->

<div class="row justify-content-center">
    <div class="col-md-12 col-xl-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="{{ route('flight-page') }}" class="btn btn-warning" style="text-decoration:none;">
                        <i class="bi bi-arrow-left"></i>                         
                        Go Back  
                    </a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{  route('international-store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{  auth()->user()->id }}">
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name1" name="airport_location_from" placeholder="various airports & location  (FROM)" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name2" name="airport_location_to" placeholder="various airports & location  (TO)" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="round" name="round_trip" value="">
                                <span class="custom-control-label" class="open">Round Trip</span>
                            </label>
                        </div>
                        <div>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="oneway" name="round_trip" value="one way">
                                <span class="custom-control-label">One Way</span>
                            </label>
                        </div>
                        
                    </div>
                    <div class="form-group  mb-4" id="flight_return_date" style="display: none">
                        <label for="inputEmail5">Return Date</label>
                        <input type="date" class="form-control" id="inputEmail5" name="flight_return_date" placeholder="Choose date for return" >
                    </div>
                    <div class="form-group  mb-4">
                        <label for="exampleInputEmail1" class="form-label">Date of Departure</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" name="flight_date" placeholder="Choose date for return" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Number of Passengers</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="number_passenger" placeholder="Number of passengers" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label">Travel Class <span class="text-red">*</span></label>
                                <select name="flight_class" class="form-control form-select select2" required data-bs-placeholder="Select">
                                    <option label="Select" >Select</option>
                                    <option value="Economy">Economy</option>
                                    <option value="Premium Economy">Premium Economy</option>
                                    <option value="Business">Business</option>
                                    <option value="First Class">First Class</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-4">
                            <div class="form-group">
                                <label for="" class="form-label">Baggage Weight</label>
                                <select name="baggage_weight" class="form-control form-select select2" data-bs-placeholder="Select" required>
                                    <option selected >Economy (checked baggage)</option>
                                    @if ($baggages)
                                     <option value="{{ $baggages->baggage  }}">{{ $baggages->baggage  }}Kg</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 mb-4">
                            <label for="" class="form-label">Passenger Details</label>
                        </div>
                        <div class="form-group col-lg-6  mb-4">
                            <label for="" class="form-label">Title:</label>
                            <select name="passenger_title" class="form-control form-select select2" data-bs-placeholder="Select">
                                <option selected> Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">First Name On Passport:</label>
                            <input type="text" name="passenger_fname_onpassport" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">Last Name On Passport:</label>
                            <input type="text" name="passenger_lastname_onpassport" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">Gender On Passport:</label>
                            <select name="passenger_gender_onpassport" class="form-control form-select select2" data-bs-placeholder="Select" required>
                                <option selected>Select Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">Date of Birth:</label>
                            <input type="date" name="date_of_birth" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12 mb-4">
                            <label class="form-label">Contact Details</label>
                            <p>
                                To ensure you receive all important sms update from us about your flight, please provide us with 
                                your phone number
                            </p>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">Email Address:</label>
                            <input type="email" name="passenger_email" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <label class="form-label">Phone Number:</label>
                            <input type="phone" name="passenger_phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-footer mt-2 text-center">
                        <button type="submit" class="w-75 btn btn-primary">Submit</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection     

@push('scripts')
    <script>
        // function OpenDate(){
        //     document.getElementById("flight_return_date").style.display = "block";
        //     console.log('working');
        // }

        const open_date = document.querySelector("#round");
        const close_date = document.querySelector("#oneway");

        open_date.addEventListener("click", function(){
            document.getElementById("flight_return_date").style.display = "block";
        });

        close_date.addEventListener("click", function(){
            document.getElementById("flight_return_date").style.display = "none";
        });

    </script>
@endpush


