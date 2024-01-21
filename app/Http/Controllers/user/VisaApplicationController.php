<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Http\Requests\VisaFee\VisaApplcationRequest;
use App\Models\Admin;
use App\Models\TransactionCharges;
use App\Models\UserWallet;
use App\Models\VisaApplication;
use App\Notifications\VisaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Unicodeveloper\Paystack\Facades\Paystack;

class VisaApplicationController extends Controller
{
    //

    public function usPay(){
        $visaApplication = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::select('visa_charge_amount')->first();

        
        //  
        $totalprecentage = ($charge->visa_charge_amount / 100) * $visaApplication->visa_fee_amount;

        // dd($totalprecentage);
        $totalprecentages = $visaApplication->visa_fee_amount + $totalprecentage;
        if ($visaApplication) {
            $visaApplication->update([
                'total_charge'=>$totalprecentages,
            ]);
        }
        return view('users.visa.us_visa_payment',compact('visaApplication','charge'));
    }

    public function storeApplication(VisaApplcationRequest $request)
    {
        if ($request->createApplication()) {
            return redirect()->route('pay-page');   
        }else{
            return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
        }
    }

    public function initiatePayment(Request $request)
    {
        $reference = 'VS_' . uniqid();
        $authnication = config('services.flutterwave.secretkey');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        $totalamount = $request->input('total');
        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
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
            $requestData = [
                'amount' => $totalamount,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "USD",
                'redirect_url' => route('paystack.webhook'),

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
            session(['visa_application' => [
                'amount' => $totalamount,
            ]]);
            $paymentLink = $responseData['data']['link'];
            return view('frontend.checkout')->with('paymentLink', $paymentLink); 
        } else {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }   
    }


    public function handleWebhook(Request $request)
    {
        $status = $request->input('status');
    
        if ($status == 'successful') {
            $paymentData = session('visa_application');
    
            if ($paymentData) {
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
                // Clear the session data after using it
                $request->session()->forget('visa_application');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('pay-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('pay-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('pay-page')->with('error', 'Payment failed');
        }
    }
    
    
       public function redirect(Request $request)
    {
        $redirectPage = $request->input('redirect_page');
        // Check if a valid page is selected
        if (!empty($redirectPage)) {
            // Decode the URL before redirection
            $decodedRedirectPage = urldecode($redirectPage);
            return redirect()->to($decodedRedirectPage);
        }
        return redirect()->route('visa-page')->with('error', 'Please select a valid page.');
    }
    
       public function Vise(){
      return  view('users.visa.vise_fee');
   }

 

   public function CanadaVisa(){
        return view('users.visa.canada_visa');
   }

   public function UsVisa(){
      return view('users.visa.us_visa');
   }
}
