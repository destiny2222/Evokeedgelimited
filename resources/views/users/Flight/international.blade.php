@extends('layout.master')
@section('content')
<div class="flight-container">
    <div class="continer">
        <div class="row">
            {{-- <div class="col-lg-12"> --}}
                <div class="payvia shadow-lg p-l-4 p-r-4 p-t-3 p-b-4 m-b-4" id="payvia">
                    <h2 class="m-b-4 " style="color: #28005F;">International Flight</h2>
                </div>
            {{-- </div> --}}
        </div>

         <div class="row">
        <div class="col-12 col-lg-12">
            
            <div class="Flight_booking">
                <form action="{{  route('international-store') }}" method="post" id="flightBookingForm">
                    @csrf
                    <input type="hidden" name="user_id" value="{{  auth()->user()->id }}">
                    <div class="row">
                        <div class="col-lg-6 m-b-3">
                            <label for=""></label>
                            <input type="text" class="applicant-input" name="airport_location_from" placeholder="various airports & location  (FROM)" required>
                        </div>
                        <div class="col-lg-6 m-b-3">
                            <label for=""></label>
                            <input type="text" class="applicant-input" name="airport_location_to" placeholder="various airports & location  (TO)" required>
                        </div>
                        <div class="col-lg-12 m-b-3">
                            <label for="">Round Trip or One Way</label>
                            <div>
                                <input type="radio"
                                    id="Netflix"
                                    name="round_trip"
                                    value="" class="open">
                                <label onclick="()" for="Netflix">Round Trip</label>
                            </div>
                        
                            <div>
                                <input type="radio"
                                    id="Audi"
                                    name="round_trip"
                                    value="One Way">
                                <label for="Audi">One Way</label>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 m-b-3" id="flight_return_date" style="display: none">
                            <label for="">Return Date</label>
                            <input type="date" class="applicant-input"  name="flight_return_date" placeholder="Choose date for return" >
                        </div>
                        <div class="col-lg-6 m-b-3">
                            <label for="">Date of Departure</label>
                            <input type="date" class="applicant-input" name="flight_date" placeholder="Choose date for return" required>
                        </div>
                        {{-- <div class="col-lg-6 m-b-3">
                            <label for="">Return Date</label>
                            <input type="date" class="applicant-input" name="flight_time" placeholder="Choose date for return" required>
                        </div> --}}
                        <div class="col-lg-6 m-b-3">
                            <label for="passengers">Number of Passengers</label>
                            <input type="phone" id="passengers" class="applicant-input" name="number_passenger" placeholder="Number of passengers" required>
                        </div>

                        {{-- <div class="col-lg-6 m-b-3">
                            <label for="">Return Date</label>
                            <input type="date" class="applicant-input" name="flight_return_date" placeholder="Choose date for return" required>
                        </div> --}}
                        
                       
                        <div class="col-lg-12 m-b-3">
                            <label for="">Travel Class</label>
                            <select name="flight_class" class="applicant-input" id="" required>
                                <option selected >Select</option>
                                <option value="Economy">Economy</option>
                                <option value="Premium Economy">Premium Economy</option>
                                <option value="Business">Business</option>
                                <option value="First Class">First Class</option>
                            </select>
                        </div>
                        <div class="col-lg-12 m-b-3">
                            <label for="">Baggage Weight</label>
                            <select name="baggage_weight" class="applicant-input" id="" required>
                                <option selected >Economy (checked baggage)</option>
                                @if ($baggages)
                                 <option value="{{ $baggages->baggage  }}">{{ $baggages->baggage  }}Kg</option>
                                @endif
                            </select>
                        </div>
                   </div> 
                   <div class="row ">
                        <div class="col-lg-12">
                            <h2 class="m-b-4 " style="color: #28005F;">Passenger Details</h2>
                        </div>
                        <div class="col-lg-12 col-12 m-b-3">
                            <h5>Title:</h5>
                            <select name="passenger_title" class="applicant-input" id="">
                                <option selected> Select</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-12 m-b-3">
                            <h5>First Name On Passport:</h5>
                            <input type="text" name="passenger_fname_onpassport" class="applicant-input" required>
                        </div>
                        <div class="col-lg-6 col-12 m-b-3">
                            <h5>Last Name On Passport:</h5>
                            <input type="text" name="passenger_lastname_onpassport" class="applicant-input" required>
                        </div>
                        <div class="col-lg-6 col-12 m-b-3">
                            <h5>Gender On Passport:</h5>
                            <select name="passenger_gender_onpassport" class="applicant-input" id="" required>
                                <option selected>Select Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-12 m-b-3">
                            <h5>Date of Birth:</h5>
                            <input type="date" name="date_of_birth" class="applicant-input" required>
                        </div>
                        <div class="col-lg-12">
                            <h3>Contact Details</h3>
                            <p>
                                To ensure you receive all important sms update from us about your flight, please provide us with 
                                your phone number
                            </p>
                        </div>
                        <div class="col-lg-12 col-12 m-b-3">
                            <h5>Email Address:</h5>
                            <input type="email" name="passenger_email" class="applicant-input" required>
                        </div>
                        <div class="col-lg-12 col-12 m-b-3">
                            <h5>Phone Number:</h5>
                            <input type="phone" name="passenger_phone" class="applicant-input" required>
                        </div>
                        <div class="col-lg-12 text-end">
                            <input type="submit" id="nextPageCustomer"  class="submit-form w-50 w-100" value="Submit">
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
        // function OpenDate(){
        //     document.getElementById("flight_return_date").style.display = "block";
        //     console.log('working');
        // }

        const open_date = document.querySelector("#Netflix");
        const close_date = document.querySelector("#Audi");

        open_date.addEventListener("click", function(){
            document.getElementById("flight_return_date").style.display = "block";
        });

        close_date.addEventListener("click", function(){
            document.getElementById("flight_return_date").style.display = "none";
        });

    </script>
@endpush


