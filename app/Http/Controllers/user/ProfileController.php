<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use Flutterwave\Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function payment(){
        return view('frontend.payment');
    }
    public function initialize(Request $request)
    {
        //This generates a payment reference
        $reference = uniqid().time();



        try {

            $authnication = config('services.flutterwave.secretkey');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '  .$authnication,
                'Content-Type' => 'application/json'
            ])->post('https://api.flutterwave.com/v3/payments', [
                'amount' => 500,
                'email' => $request->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "USD",
                'redirect_url' => route('callback'),

                'customer' => [
                    'email' => $request->email,
                    "phone_number" => $request->phone,
                    "name" => $request->name
                ],

                "customizations" => [
                    "title" => 'Movie Ticket',
                    "description" => "20th October"
                ]
            ]);
            $responseData = $response->json(); // Convert the response to JSON

            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                $paymentLink = $responseData['data']['link'];
                return view('frontend.checkout')->with('paymentLink', $paymentLink); 
            } else {
                return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
        }

    }

    public function callback(Request $request)
    {
        $status = $request->input('status');

        if ($status == 'successful') {
            $user_id = auth()->user()->id;
            $name = $request->input('name');
            $amount = $request->input('amount');
    
            UserWallet::create([
                'user_id' => $user_id,
                'name' => $name,
                'amount' => $amount,
            ]);
            return redirect()->route('success')->with('message', 'Payment successful');
        }
        elseif ($status ==  'cancelled'){
            return redirect()->route('cancelled')->with('message', 'Payment cancelled');
        }
        else{
            return redirect()->route('error')->with('message', 'Payment failed');
        }

    }

}
