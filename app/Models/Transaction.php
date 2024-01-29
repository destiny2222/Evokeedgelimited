<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'charge',
        'pending_balance',
        'trans_id',
        'user_id',
        'trans_type',
        'status',
        'trans_ref',
        'tuition_id',
        'tuitionw_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wallet(){
        return $this->belongsTo(UserWallet::class);
    }
}
