<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    public $fillable = [
        'description',
        'currency',
      'seller_name',
      'email_supplier',
       'bank_amount_name',
       'paid',
       'bank_account_number',
       'bank_swift_code',
       'bank_route_number',
       'bank_reference_number',
       'total_amount',
     'recipient',
        'user_id',
       'country',
       'city',
       'payment_method',
        'amount',
       'postcode',
       'done',
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function getAmountAttribute($value) {
       return '$' . number_format($value, 2);
    }
}
