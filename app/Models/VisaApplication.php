<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaApplication extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'case_number',
       'invoice_id',
       'visa_fee_amount',
       'total_charge',
       'visa_website_link',
       'user_password',
       'username',
       'visa_type',
       'user_id',
       'done',
    ];

   public function user(){
        return $this->belongsTo(User::class);
    }
}
