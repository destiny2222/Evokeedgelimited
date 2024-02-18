<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Http\Requests\VisaFee\VisaApplcationRequest;
use App\Models\Admin;
use App\Models\UserWallet;
use App\Models\VisaApplication;
use App\Notifications\VisaNotification;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use RealRashid\SweetAlert\Facades\Alert;

class VisaApplicationController extends Controller
{
   
    public function initiatePayment(Request $request)
    {

        $reference = Flutterwave::generateReference();
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        // get the amount
        $totalamount = $request->input('total');
        // user wallet
        $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();

        
        if ($selectedPaymentMethod == 'balance') {
            if($userWallet == null){
                return back()->with('error', 'Insufficient wallet balance');
            }
            if ($userWallet->amount < $totalamount) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $totalamount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save();   
            }
            $users = $payment->user;
            if($users){
                $admin = Admin::where('id', 1)->first();
                $admin->notify(new VisaNotification($users));
            }else{
                Alert::error('An error occurred');
                return back();
            }
            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'payment') {
            $data = [
                'payment_options' => 'card, bank, ussd,bank transfer',
                'amount' => $request->input('amount'),
                'email' => $request->input('email'),
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('handle.callback'),
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


    public function handleWebhook(Request $request)
    {
        $status = request()->status;
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            if ($data) {
                $payment = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save(); 
                  
                $users = $payment->user;
                if($users){
                    $admin = Admin::where('id', 1)->first();
                    $admin->notify(new VisaNotification($users));
                }else{
                    Alert::error('An error occurred');
                    return back();
                }
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('visa-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('visa-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('visa-page')->with('error', 'Payment failed');
        }
    } 
   
}
