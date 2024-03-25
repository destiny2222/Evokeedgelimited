<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCharges extends Model
{
    use HasFactory;

    protected $fillable = [
        'tuition_charge_amount',
        'visa_charge_amount',
        'corporate_charge_amount',
        'merchant_charge_amount',
        'flights_charge_amount',
        'bdc_charge',
        'other_service',
        'deposit_charge',
    ];
}
