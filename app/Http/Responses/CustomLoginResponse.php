<?php

namespace App\Http\Responses;

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function toResponse($request)
    {
        
        return redirect()->route('dashboard-page');
        // if (auth()->check()) {
        //     $user = $request->user();

        //     if (!$user->hasSubmittedKYC()) {
        //         return redirect()->route('kyc-page');
        //     } elseif (!$user->isKYCApproved()) {
        //         Auth::logout();
        //         return redirect()->route('login')->with('info', 'Your documents is Undergoing verification!');
        //     }

        //     return redirect()->route('dashboard-page');
        // } else {
        //     $user = $request->user();

        //     if (!$user->hasSubmittedKYC()) {
        //         return redirect()->route('kyc-page');
        //     } elseif (!$user->isKYCApproved()) {
        //         Auth::logout();
        //         return redirect()->route('login')->with('info', 'Your documents is Undergoing verification!');
        //     }

        //     return redirect()->route('dashboard-page');
        // }
    }
}
