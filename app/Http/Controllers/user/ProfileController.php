<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use Flutterwave\Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function DeactivateAccount(Request $request){
        $this->validate($request, [
            'current_password' => ['required', 'string'],
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        if(password_verify($request->current_password,  $user->password)){
            $user->update([ 
                'retention'=> true,
            ]);
            Auth::logout();
            return redirect()->route('home-page');
        }else{
            return back()->with('error', 'The password does not match the current password?');
        }
    }
}
