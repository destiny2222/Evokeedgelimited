<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country',
        'phone',
        'address',
        'referrence_id',
        'image',
        'last_name',
        'email',
        'retention',
        'is_banned',
        'state',
        'city',
        'password',
        'access_token',
    ];

    // function getNameAttribute(){
    //     return sprintf('%s  %s', $this->firstname , $this->lastname);
    // }

    public function trans(){
        return $this->hasMany(Transaction::class);
    }


    public function userSetting(){
        return $this->hasOne(user_setting::class);
    }

    public function visa(){
        return $this->hasMany(VisaApplication::class);
    }

    public function userwallet(){
        return $this->hasOne(UserWallet::class);
    }

    public function kyc(){
        return $this->hasOne(Kyc::class);
    }

    public function corporate(){
        return $this->hasMany(CorporateService::class);
    }

    public function tuitionpayment(){
        return $this->hasMany(TuitionPayment::class);
    }

    public function tuitionPaymentWire(){
        return $this->hasMany(TuitionPaymentWire::class);
    }

    // otherservice
    public function otherservice(){
        return $this->hasMany(OtherService::class);
    }

    // localfight
    public function localfight(){
        return $this->hasMany(LocalFlight::class);
    }

    // internationalflight
    public function internationalflight(){
        return $this->hasMany(InternationalFlight::class);
    }

    // mechadise
    public function merchandise(){
        return $this->hasMany(Merchandise::class);
    }
   




    public function kycIsRequired(){
        if($this->kyc){
            return $this->kyc->kyc_status == "RESUBMIT" || $this->kyc->kyc_status == "DECLINED";
        }
        return true;
    }

    public function kycIsProcessing(){
        if ($this->kyc) return $this->kyc &&  $this->kyc->kyc_status == "PROCESSING";
        // }
        // return false;
    }


    public function kycIsApproved(){
        return $this->kyc && $this->kyc->kyc_status == "APPROVED";   
    }

    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
