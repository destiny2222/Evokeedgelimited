<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa',
        'tuition_payment',
        'flight_booking',
        'corporate_service',
        'merchandise_payment',
        'other_service'
    ];
}
