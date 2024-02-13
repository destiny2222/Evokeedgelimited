<?php

namespace App\Http\Controllers\user;
use App\Models\UserWallet;
use App\Notifications\CorporateServiceNotification;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CorporateService;
use App\Models\Merchandise;
use App\Models\OtherService;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function CorporatePayment(Request $request)
    {
        $reference = Flutterwave::generateReference();
        $selectedPaymentMethod = $request->input('paymentMethod');

        $corporate_balance =  CorporateService::where('user_id', auth()->user()->id)->latest()->first();

        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $corporate_balance->total_amount) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $corporate_balance->total_amount;
                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = CorporateService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save();   
            }
            // $users = $payment->user;
            // $users = User::where('id', $payment->id)->first();
            // if($users){
            //     $admin = Admin::where('id', 1)->first();
            //     $admin->notify(new CorporateServiceNotification($users));
            // }else{
            //     return back()->with('error', 'An error occurred');
            // }
            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'visa') {
            $data = [
                'payment_options' => 'card, bank, ussd,bank transfer',
                'amount' => $request->input('amount'),
                'email' => $request->input('email'),
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('corporate.payment.callback'),
                'customer' => [
                    'email' => $request->input('email'),
                    "phone_number" => $request->input('phone'),
                    "name" =>  $request->input('name'),
                ],
    
                "customizations" => [
                    "title" => 'EvokeEdge  LLC',
                ]
            ];
    
            $payment = Flutterwave::initializePayment($data);
            if ($payment && isset($payment['status']) && $payment['status'] === 'success' && isset($payment['data']['link'])) {
                return redirect($payment['data']['link']);
            } else {
                return back()->with('error', 'Oops, something went wrong. Please refresh the page and try again');
            }      
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }   
    }


    public function handlecallback(Request $request)
    {
        $status = request()->status;
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
        
            if($data){
                $payment = CorporateService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save(); 
            }
           return redirect()->route('initiator-page')->with('success', ' Payment Successfully');
        }
        elseif ($status ==  'cancelled'){
            return back()->with('warning', 'transaction has been cancelled');
        }
        else{
            return back()->with('error', 'transaction has failed');
        }
    }


    public function MerchandisePayment(Request $request){
        $reference = Flutterwave::generateReference();
        $selectedPaymentMethod = $request->input('paymentMethod');
        $payment = Merchandise::where('user_id', auth()->user()->id)->latest()->first();

        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $payment->total_amount) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $payment->total_amount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                if($payment){
                    $payment->paid = 1;
                    $payment->payment_method = $selectedPaymentMethod;
                    $payment->save();  
                }
                 
            }
            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        }elseif ($selectedPaymentMethod == 'visa') {
            $data = [
                'payment_options' => 'card, bank, ussd,bank transfer',
                'amount' => $request->input('amount'),
                'email' => $request->input('email'),
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('merchandise.cellback'),
                'customer' => [
                    'email' => $request->input('email'),
                    "phone_number" => $request->input('phone'),
                    "name" =>  $request->input('name'),
                ],
    
                "customizations" => [
                    "title" => 'EvokeEdge  LLC',
                ]
            ];
    
            $payment = Flutterwave::initializePayment($data);
            if ($payment && isset($payment['status']) && $payment['status'] === 'success' && isset($payment['data']['link'])) {
                return redirect($payment['data']['link']);
            } else {
                return back()->with('error', 'Oops, something went wrong. Please refresh the page and try again');
            } 
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }
        
    }

    public function Merchandisecallback(Request $request)
    {
        $status = request()->status;
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
        
            if($data){
                $payment = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save(); 
            }
           return redirect()->route('initiator-page')->with('success', ' Payment Successfully');
        }
        elseif ($status ==  'cancelled'){
            return back()->with('warning', 'transaction has been cancelled');
        }
        else{
            return back()->with('error', 'transaction has failed');
        }
    }


    public function otherservicePayment(Request $request){
       
        $selectedPaymentMethod = $request->input('paymentMethod');
        $reference = Flutterwave::generateReference();

        $totalamount = OtherService::where('user_id', auth()->user()->id)->latest()->first();

        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $totalamount->total_amount) {
                return back()->with('error', 'Insufficient wallet balance. Please choose another payment method.');
            }else {
                $userbalance = $userWallet->amount - $totalamount->total_amount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = OtherService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $selectedPaymentMethod;
                $payment->save();   
            }

            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'visa') {
            $data = [
                'payment_options' => 'card, bank, ussd,bank transfer',
                'amount' => $request->input('amount'),
                'email' => $request->input('email'),
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('merchandise.cellback'),
                'customer' => [
                    'email' => $request->input('email'),
                    "phone_number" => $request->input('phone'),
                    "name" =>  $request->input('name'),
                ],
    
                "customizations" => [
                    "title" => 'EvokeEdge  LLC',
                ]
            ];
    
            $payment = Flutterwave::initializePayment($data);
            if ($payment && isset($payment['status']) && $payment['status'] === 'success' && isset($payment['data']['link'])) {
                return redirect($payment['data']['link']);
            } else {
                return back()->with('error', 'Oops, something went wrong. Please refresh the page and try again');
            } 
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }  
    }

    public function otherservicePayCallback(Request $request){
        $status = request()->status;
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
        
            if($data){
                $payment = OtherService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save(); 
            }
           return redirect()->route('initiator-page')->with('success', ' Payment Successfully');
        }
        elseif ($status ==  'cancelled'){
            return back()->with('warning', 'transaction has been cancelled');
        }
        else{
            return back()->with('error', 'transaction has failed');
        }
    }
}
