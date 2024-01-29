<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\KycRequest;
use App\Http\Requests\Tuition\WireTransfer;
use App\Models\Admin;
use App\Models\Kyc;
use App\Models\Setting;
use App\Models\TransactionCharges;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use App\Models\UserWallet;
use App\Notifications\PaymentMadeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    //

    public function Manage(){
        return view('users.settings.manage');
    }


    public function helps(){
        return view('users.settings.helps');
    }




    public function OthersPayment() {
        $charges = TransactionCharges::where('other_service', 'id')->first();
        return view('users.otherservice.OthersPayment', compact('charges'));
    }








   



     
}
