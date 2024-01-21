<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Corporate\StoreRequest;
use App\Models\Admin;
use App\Models\CorporateService;
use App\Models\TransactionCharges;
use App\Models\User;
use App\Models\UserWallet;
use App\Notifications\CorporateServiceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class CorporateController extends Controller
{

    
    public  function Corporate(){
        
        return view('users.Corporate.corporate');
    }


    public function store(StoreRequest $request){
        if ($request->createService()) {
            
            return redirect()->route('corporate-payment-page');
        } else {
            return back()->with('error','an error occurred');
        }
    }


    public function paymentPay(){
        $Corporate =  CorporateService::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::select('corporate_charge_amount')->first();

        
        $totalprecentage = ($charge->corporate_charge_amount / 100) * $Corporate->amount;

        // dd($totalprecentage);
        $totalprecentages = $Corporate->amount + $totalprecentage;
        if($Corporate){
            $Corporate->update([
                'total_amount'=>$totalprecentages
            ]);
        }

        return view('users.Corporate.payment', compact('Corporate', 'totalprecentages', 'charge'));
    }


    public function CorporatePayment(Request $request)
    {
        $reference = 'VS_' . uniqid();
        $authnication = config('services.flutterwave.secretkey');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        $balance = $request->input('total');

        $corporate_balance =  CorporateService::where('user_id', auth()->user()->id)->latest()->first();


        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $balance) {
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
            $users = User::where('id', $payment->id)->first();
            if($users){
                $admin = Admin::where('id', 1)->first();
                $admin->notify(new CorporateServiceNotification($users));
            }else{
                // return back()->with('error', 'An error occurred');
            }
            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'visa') {
            $requestData = [
                'amount' =>$balance ,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "USD",
                'redirect_url' => route('corporate-payment-callback'),

                'customer' => [
                    'email' => auth()->user()->email,
                    "phone_number" => auth()->user()->phone,
                    "name" => auth()->user()->name
                ],

                "customizations" => [
                    "title" => 'EvokeEdge  Limited',
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
                'amount' => $balance,
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
