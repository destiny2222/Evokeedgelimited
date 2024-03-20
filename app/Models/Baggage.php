<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baggage extends Model
{
    use HasFactory;

    protected $fillable = [
        'baggage',
        'international_baggage'
    ];

    public function international(){
        return $this->belongsTo(InternationalFlight::class);
    }

    public function local(){
        return $this->belongsTo(LocalFlight::class);
    }
}
