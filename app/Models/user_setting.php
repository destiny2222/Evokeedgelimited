<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_setting extends Model
{
    use HasFactory;

    public $fillable = [
        'announcement',
        'platform_update',
        'email_notification',
        'user_id',
     ];
 
     public function user(){
         return $this->belongsTo(User::class);
     }
}
