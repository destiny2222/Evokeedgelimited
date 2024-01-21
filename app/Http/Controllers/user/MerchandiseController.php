<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchandise\MerchandiseRequest;
use App\Models\Admin;
use App\Models\Merchandise;
use App\Models\TransactionCharges;
use App\Models\UserWallet;
use App\Notifications\MerchandiseNotification;
use App\Notifications\PaymentMadeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class MerchandiseController extends Controller
{

    public function Merchandise() {
        return view('users.merchandise.merchandise');
    }


    public function MerchandisePay(){
        $merchandise = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
        // dd($merchandise->user->name);
        $charge = TransactionCharges::select('merchant_charge_amount')->first();
        
        // 
        $totalprecentage = ($charge->merchant_charge_amount / 100) * $merchandise->amount;

        $Totalamount = $merchandise->amount + $totalprecentage;
        if ($merchandise) {
            $merchandise->update([
                'total_amount'=>$Totalamount,
            ]);
        }
        return view('users.merchandise.pay', compact('merchandise', 'charge'));
    }
    public function merchandiseStore(MerchandiseRequest $request){
        if ($request->createMerhance()) {
            return redirect()->route('merchandise-pay');
        }else{
            return back()->with('error', 'Something went wrong');
        }
    }


    public function MerchandisePayment(Request $request){

        $reference = 'VS_' . uniqid();
        $authnication = config('services.flutterwave.secretkey');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        $totalamount = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $totalamount->total_amount) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $totalamount->total_amount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $selectedPaymentMethod;
                $payment->save();   
            }

            $users = $payment->user;
            if($users){
                $admin = Admin::where('id', 1)->first();
                $admin->notify(new MerchandiseNotification($users));
            }else{
                Alert::error('An error occurred');
                return back();
            }

            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        }elseif ($selectedPaymentMethod == 'visa') {
            $requestData = [
                'amount' => $totalamount->total_amount,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "USD",
                'redirect_url' => route('merchandise-cellback'),

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


    public function handlecallback(Request $request)
    {
        $status = $request->input('status');

        if ($status == 'successful') {
            $paymentData = session('pay_merchandise');
    
            if ($paymentData) {
                $payment = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $paymentData['payment_method'];
                $payment->save();  
                
                $users = $payment->user;
                if($users){
                    $admin = Admin::where('id', 1)->first();
                    $admin->notify(new MerchandiseNotification($users));
                }else{
                    Alert::error('An error occurred');
                    return back();
                }
               
                // Clear the session data after using it
                $request->session()->forget('pay_merchandise');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('merchandise-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('merchandise-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('merchandise-page')->with('error', 'Payment failed');
        }
    }
}
