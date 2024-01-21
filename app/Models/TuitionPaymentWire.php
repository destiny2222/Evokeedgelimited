<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionPaymentWire extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_name',
        'user_id',
        'account_number',
        'student_email',
        'routing_number',
        'student_id',
        'bank_swift_code',
        'school_iban',
        'school_address',
        'service_type',
        'college_name',
        'amount',
        'paid',
        'done'
    ];

    public function user(){
      return  $this->belongsTo(User::class);
    }
}
