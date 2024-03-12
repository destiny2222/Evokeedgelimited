<?php

namespace App\Http\Requests\Flight;

use App\Models\LocalFlight;
use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'airport_location_from'=>'nullable|string',
            'airport_location_to'=>'nullable|string',
            'flight_date'=>'nullable|date',
            'flight_return_date'=>'nullable|date',
            'flight_class'=>'nullable|string',
            'adult'=>'nullable|string',
            'child'=>'nullable|string',
            'infant'=>'nullable|string',
            'gender'=>'nullable|string',
            'title'=>'nullable|string',
            'date_birth_date'=>'nullable|date',
            'first_name'=>'nullable|string',
            'last_name'=>'nullable|string',
            'nationality'=>'nullable|string',
            'phone'=>'nullable|string',
            'email'=>'nullable|string',
            'on_way'=>'nullable|string',
            'round_trip'=>'nullable|string',
        ];
    }

    public function createLocal(){
        LocalFlight::create([ 
            'airport_location_from'=>$this->airport_location_from,
            'airport_location_to'=>$this->airport_location_to,
            'flight_date'=>$this->flight_date,
            'flight_class'=>$this->flight_class,
            'adult'=>$this->adult,
            'child'=>$this->child,
            'infant'=>$this->infant,
            'gender'=>$this->gender,
            'title'=>$this->title,
            'date_birth_date'=>$this->date_birth_date,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'nationality'=>$this->nationality,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'user_id'=>$this->user_id,
            'flight_return_date'=>$this->flight_return_date,
            'on_way'=>$this->on_way,
            'round_trip'=>$this->round_trip,
        ]);
        return true;
    }
}
