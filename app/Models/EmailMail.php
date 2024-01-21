<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailMail extends Model
{
    use HasFactory;

    protected $table ='email_mails';
    protected $fillable = [
        'name',
        'subject',
        'email',
        'message',
    ];
}
