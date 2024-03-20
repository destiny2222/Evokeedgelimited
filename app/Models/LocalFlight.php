<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airport_location_from',
        'airport_location_to',
        'flight_date',
        'flight_class',
        'adult',
        'child',
        'infant',
        'on_way',
        'round_trip',
        'gender',
        'title',
        'date_birth_date',
        'first_name',
        'flight_return_date',
        'last_name',
        'nationality',
        'baggage_weight',
        'phone',
        'email',
        'user_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
