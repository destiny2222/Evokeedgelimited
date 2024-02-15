<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TuitionPayment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'legal_name',
        'user_id',
        'amount',
        'student_email',
        'portal_password',
        'student_id',
        'portal_link',
        'service_type',
        'college_name',
        'paid',
        'done'
    ];

    public function user(){
      return  $this->belongsTo(User::class);
    }
}
