<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'user_id',
       'balance',
       'amount',
       'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function transactions(){
      return  $this->hasMany(Transaction::class, 'user_id');
    }

    public function isNullOrEmpty($amount){
      return $amount === 0 || trim($amount)==='';
    }
}
