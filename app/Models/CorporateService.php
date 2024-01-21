<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateService extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'bank_name',
        'bank_address',
        'bank_account_number',
        'amount',
        'bank_swift_code',
        'user_id',
        'paid',
        'total_amount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
