<?php

namespace App\Http\Requests\Flight;

use App\Models\InternationalFlight;
use Illuminate\Foundation\Http\FormRequest;

class InternationalFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'airport_location_from' =>'nullable|string',
            'airport_location_to' =>'nullable|string',
            'flight_date' =>'nullable|date',
            'flight_return_date' =>'nullable|date',
            'flight_class' =>'nullable|string',
            // 'flight_time' =>'nullable|time',
            'number_passenger' =>'nullable|string',
            'baggage_weight' =>'nullable|string',
            'passenger_title' =>'nullable|string',
            'passenger_fname_onpassport' =>'nullable|string',
            'passenger_lastname_onpassport' =>'nullable|string',
            'passenger_gender_onpassport' =>'nullable|string',
            'date_of_birth' =>'nullable|date',
            'passenger_email' =>'nullable|string',
            'passenger_phone' =>'nullable|string',
        ];
    }


    public function createFlightBooking(){
        InternationalFlight::create([
            'airport_location_from' => $this->airport_location_from,
            'airport_location_to' => $this->airport_location_to,
            'flight_date' => $this->flight_date,
            'flight_return_date' => $this->flight_return_date,
            'flight_class' => $this->flight_class,
            // 'flight_time' => $this->flight_time,
            'round_trip' => $this->round_trip,
            'user_id' => $this->user_id,
            'number_passenger' => $this->number_passenger,
            'baggage_weight' => $this->baggage_weight,
            'passenger_title' => $this->passenger_title,
            'passenger_fname_onpassport' => $this->passenger_fname_onpassport,
            'passenger_lastname_onpassport' => $this->passenger_lastname_onpassport,
            'passenger_gender_onpassport' => $this->passenger_gender_onpassport,
            'date_of_birth' => $this->date_of_birth,
            'passenger_phone' => $this->passenger_phone,
            'passenger_email' => $this->passenger_email,

        ]);
        return true;
    }
}
