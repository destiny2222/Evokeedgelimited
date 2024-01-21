<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherService\StoreRequest;
use App\Models\Admin;
use App\Models\OtherService;
use App\Models\TransactionCharges;
use App\Models\UserWallet;
use App\Notifications\TransctionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class OtherserviceController extends Controller
{


    
    public function storeOtherservice(StoreRequest  $request){
        if ($request->storeService()) {
            return  redirect()->route('otherservice-pay');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function otherPay(){
        $otherservice = OtherService::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::select('other_service')->first();
        
        $totalprecentage = ($charge->other_service / 100) * $otherservice->amount;

        $ToatalAmount =  $otherservice->amount + $totalprecentage;
        
        if ($otherservice->amount == null) {
           return back()->with('error', 'Amount must be provided');
        }elseif($otherservice){
            $otherservice->update([
                'total_amount'=>$ToatalAmount,
            ]);
        }else{
            return back()->with('error', 'An error occurred');
        }
      
        return view('users.otherservice.pay', compact('otherservice', 'charge'));
    }

    public function otherservicePayment(Request $request){
        $reference = 'VS_' . uniqid();
        $authnication = config('services.flutterwave.secretkey');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');

        $totalamount = OtherService::where('user_id', auth()->user()->id)->latest()->first();
       
        $total_amount = $request->input('total');
        $requestData = [];

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
            $users = $payment->user;
            if($users){
                $admin = Admin::where('id', 1)->first();
                $admin->notify(new TransctionNotification($users));
            }else{
                Alert::error('An error occurred');
                return back();
            }

            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'visa') {
            $requestData = [
                'amount' => $total_amount,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "USD",
                'redirect_url' => route('otherservice-pay-callback'),

                'customer' => [
                    'email' => auth()->user()->email,
                    "phone_number" => auth()->user()->phone,
                    "name" => auth()->user()->name
                ],

                "customizations" => [
                    "title" => 'EvokeEdge  Limited',
                    "description" => "20th October"
                ]
            ];
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authnication,
            'Content-Type' => 'application/json'
        ])->post('https://api.flutterwave.com/v3/payments', $requestData);

        $responseData = $response->json();
        if (isset($responseData['status']) && $responseData['status'] === 'success') {
            session(['pay_merchandise' => [
                'amount' => $totalamount->total_amount,
                'payment_method'=>$selectedPaymentMethod
            ]]);
            $paymentLink = $responseData['data']['link'];
            return view('frontend.checkout')->with('paymentLink', $paymentLink); 
        } else {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }  
    }

    public function otherservicePayCallback(Request $request){
        $status = $request->input('status');

        if ($status == 'successful') {
            $paymentData = session('pay_merchandise');
    
            if ($paymentData) {
                $payment = OtherService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $paymentData['payment_method'];
                $payment->save();   

                $users = $payment->user;
                if($users){
                    $admin = Admin::where('id', 1)->first();
                    $admin->notify(new TransctionNotification($users));
                }else{
                    Alert::error('An error occurred');
                    return back();
                }
               
                // Clear the session data after using it
                $request->session()->forget('pay_merchandise');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('otherservice-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('otherservice-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('otherservice-page')->with('error', 'Payment failed');
        }
    }
}


