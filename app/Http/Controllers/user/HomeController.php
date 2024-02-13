<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\user_setting;
use Illuminate\Http\Request;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users =  User::find(auth()->user()->id);
        $walletbalance = UserWallet::where('user_id', auth()->user()->id)->first();
        $settings = Setting::first();
        return view('users.index',[
            'balance'=>$walletbalance,
            'setting'=>$settings,
            'user'=>$users
        ]);
    }


    public function KYC(){
        return view('users.settings.kyc');
    }

    public  function Setting(){
        $announcementSettings = user_setting::where('user_id', auth()->user()->id)->first();
        return view('users.settings.setting',compact('announcementSettings'));
    }
    public  function Profile(){
        $user = Auth::user();
        return view('users.settings.profile', [
            'user'=>$user,
        ]);
    }




   
}


