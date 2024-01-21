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
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
