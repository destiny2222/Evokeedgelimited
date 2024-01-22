<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserWallet\UpdateWallet;
use App\Models\Transaction;
use App\Models\UserWallet;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Unicodeveloper\Paystack\Facades\Paystack;

class DepositController extends Controller
{


 public function initialize(Request $request)
    {
        $request->validate([
            'amount'=>['required', 'string'],
        ]);

        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card, bank, ussd,bank transfe',
            'amount' => $request->input('amount'),
            'email' => $request->input('email'),
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $request->input('email'),
                "phone_number" => $request->input('phone'),
                "name" =>  $request->input('name'),
            ],

            "customizations" => [
                "title" => 'EvokeEdge  Limited',
            ]
        ];

        $payment = Flutterwave::initializePayment($data);
        if ($payment && isset($payment['status']) && $payment['status'] === 'success' && isset($payment['data']['link'])) {
            return redirect($payment['data']['link']);
        } else {
            return back()->with('error', 'Oops, something went wrong. Please refresh the page and try again');
        }        
    }

 public function webhook(){
    $data = Flutterwave::receiveWebhook();
    $txref = $data['txRef'];
   if($data['status'] === 'succesful'){
        $payment = new  Transaction;
        $payment->trans_id = $data['data']['id'];
        $payment->user_id = auth()->user()->id;
        $payment->trans_type = $data['data']['payment_type'];
        $payment->pending_balance = $data['data']['amount'];
        $payment->charge = $data['data']['charged_amount'];
        $payment->trans_ref = $data['data']['tx_ref'];
        $payment->status = '1';
        $payment->save();
   }
    
 }

  
 public function handlecallback()
    {
        $status = request()->status;
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            $payment = new  Transaction;
            $payment->trans_id = $data['data']['id'];
            $payment->user_id = auth()->user()->id;
            $payment->trans_type = $data['data']['payment_type'];
            $payment->pending_balance = $data['data']['amount'];
            $payment->charge = $data['data']['charged_amount'];
            $payment->trans_ref = $data['data']['tx_ref'];
            $payment->status = '1';
            $payment->save();
           
            $wallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if(!$wallet){
                $wallet = new UserWallet;
                $wallet->user_id = auth()->user()->id;
                $wallet->amount = $payment->pending_balance;
                $wallet->save();
            }else{
                $wallet->update([
                    'amount'=> $wallet->amount + $payment->pending_balance,
                    'user_id'=> auth()->user()->id,
                ]);
            }
            $payment->update(['pending_balance' => 0]);

           return redirect()->route('deposit-page')->with('success', ' Payment Successfully');
        }
        elseif ($status ==  'cancelled'){
            return back()->with('warning', 'transaction has been cancelled');
        }
        else{
            return back()->with('error', 'transaction has failed');
        }
        
    }

}
