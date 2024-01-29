<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airport_location_from',
        'airport_location_to',
        'flight_date',
        'flight_return_date',
        'flight_class',
        'round_trip',
        'user_id',
        'number_passenger',
        'baggage_weight',
        'passenger_title',
        'passenger_fname_onpassport',
        'passenger_lastname_onpassport',
        'passenger_gender_onpassport',
        'date_of_birth',
        'passenger_email',
        'passenger_phone',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setDateAttribute($value){
        $this->attributes['flight_date'] = Carbon::parse($value)->format('Y-m-d');
        $this->attributes['flight_return_date'] = Carbon::parse($value)->format('Y-m-d');
        $this->attributes['date_of_birth'] = Carbon::parse($value)->format('Y-m-d');
    }

    protected $dates = [ 
        'flight_date',
        'flight_return_date',
        'date_of_birth',
    ];
}
