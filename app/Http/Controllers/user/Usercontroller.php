<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\KycRequest;
use App\Models\Kyc;
use App\Models\Transaction;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Usercontroller extends Controller
{
    public  function storeKyc(KycRequest $request){
        try {
            if(Kyc::count()){
                Kyc::first()->update($request->validated());
                return redirect(route('login'))->with('info', 'Sent successfully! Undergoing verification');
            }else{
                Kyc::create($request->validated());
                return back()->with('error', 'Oops Something went Worry, try again');
            }
           
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops Something went Worry, try again');
        }
        
    }


    public function addBalance(){
        return view('users.deposit.add');
    }

    public function deposit()
    {
        $users = Auth::user();
        // $pendingbalance =  Transaction::where('user_id', $users->id)->where('pending_balance', '!=', null)->select('pending_balance')->get()->sum('pending_balance');
        $userbalance = UserWallet::where('user_id', $users->id)->first();
        // dd($balance->balance);
        return view('users.deposit.index', compact('userbalance'));
    }
}
