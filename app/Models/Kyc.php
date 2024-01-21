<?php

namespace App\Models;

use App\Traits\EnableDisableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $fillable = [
       'gender',
       'marital_status',
       'date_birth',
       'nationality',
       'permenant_address',
       'street_address',
       'street_address_2',
       'status',
       'proof_of_address',
       'documents',
       'decleration_firstname',
       'decleration_lastname',
       'signature',
       'data_sign',
       'user_id',
       'approve_status',
       'kyc_status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getuserEmail(){
        return $this->user;
    }
}
