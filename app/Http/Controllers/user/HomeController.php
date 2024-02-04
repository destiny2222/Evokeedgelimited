<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
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
        // dd($users->kycIsRequired());
        $walletbalance = UserWallet::where('user_id', $users->id)->get();
        $settings = Setting::first();
        return view('users.index',[
            'balance'=>$walletbalance->sum('amount'),
            'setting'=>$settings,
            'user'=>$users
        ]);
    }


    public function KYC(){
        return view('users.settings.kyc');
    }

    public  function Setting(){
        $user = Auth::user();
        return view('users.settings.setting', [
            'user'=>$user,
        ]);
    }
    public  function Profile(){
        $user = Auth::user();
        return view('users.settings.profile', [
            'user'=>$user,
        ]);
    }


   
}


