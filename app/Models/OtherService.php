<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherService extends Model
{
    use HasFactory;

    protected $fillable = [
        'funds',
        'amount',
        'beneficiary',
        'holder',
        'account_number',
        'swift_code',
        'route_number',
        'reference_number',
        'total_amount',
        'user_id',
        'payment_method',
        'done',
        'paid',
    ];

    public function user(){
        return $this->belongsTo(User::class);
     }
}
