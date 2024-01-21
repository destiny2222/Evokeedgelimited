<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'amount',
        'email',
        'firstname',
        'lastname',
        'payment_status',
        'bookinglink',
        'other_information',
        'reference_id',
        'transaction_id',
    ];    
}
