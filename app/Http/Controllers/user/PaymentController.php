<?php

namespace App\Http\Controllers\user;
use App\Models\UserWallet;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Http\Controllers\Controller;
use App\Models\CorporateService;
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
                'redirect_url' => route('handle.callback'),
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
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }   
    }


    public function handlecallback(Request $request)
    {
        $status = $request->input('status');
    
        if ($status == 'successful') {
            $paymentData = session('corporate_balance');
    
            if ($paymentData) {
                $payment = CorporateService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save(); 
                  
                $users = User::where('id', $payment->id)->first();
                if($users){
                    $admin = Admin::where('id', 1)->first();
                    $admin->notify(new CorporateServiceNotification($users));
                }else{
                    return back()->with('error', 'An error occurred');
                }
                // Clear the session data after using it
                $request->session()->forget('corporate_balance');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('corporate-payment-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('corporate-payment-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('corporate-payment-page')->with('error', 'Payment failed');
        }
    }
}
