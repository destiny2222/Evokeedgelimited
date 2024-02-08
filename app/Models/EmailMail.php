<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmailMail extends Model
{
    use HasFactory, Notifiable;

    protected $table ='email_mails';
    protected $fillable = [
        'name',
        'subject',
        'email',
        'message',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
