<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserWallet\UpdateWallet;
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





    // public function depositPayment(Request $request)
    // {

    //     $request->validate([
    //         'amount'=>['required', 'string'],
    //         'user_id'=>['required', 'string'],
    //     ]);

    //         $reference = 'VS_' . uniqid();
    //         $authnication = config('services.flutterwave.secretkey');
    //         $response = Http::withHeaders([
    //             'Authorization' => 'Bearer '  .$authnication,
    //             'Content-Type' => 'application/json'
    //         ])->post('https://api.flutterwave.com/v3/payments', [
    //             'amount' => $request->amount,
    //             'email' => $request->email,
    //             'payment_options'=> "card, bank, ussd,bank transfer",
    //             'tx_ref' => $reference,
    //             'currency' => "USD",
    //             'redirect_url' => route('callback'),

    //             'customer' => [
    //                 'email' => $request->email,
    //                 "phone_number" => $request->phone,
    //                 "name" => $request->name
    //             ],

    //             "customizations" => [
    //                 "title" => 'EvokeEdge  Limited',
    //             ]
    //         ]);

    //         $responseData = $response->json();

    //         if (isset($responseData['status']) && $responseData['status'] === 'success') {
    //             $paymentLink = $responseData['data']['link'];
    //             return view('frontend.checkout')->with('paymentLink', $paymentLink); 
    //         } else {
    //             return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
    //         }
    // }




 public function initialize(Request $request)
    {
        $request->validate([
            'amount'=>['required', 'string'],
            // 'user_id'=>['required', 'string'],
        ]);
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card, bank, ussd,bank transfe',
            'amount' => $request->input('amount'),
            'email' => $request->input('email'),
            'tx_ref' => $reference,
            'currency' => "USD",
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
        if ($payment['status'] !== 'success') {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }

        return redirect($payment['data']['link']);
    }


  public function webhook(Request $request)
  {
    $verified = Flutterwave::verifyWebhook();
    if ($verified && $request->event == 'charge.completed' && $request->data->status == 'successful') {
        $verificationData = Flutterwave::verifyPayment($request->data['id']);
        if ($verificationData['status'] === 'success') {
        // process for successful charge

        }

    }

    // if it is a transfer event, verify and confirm it is a successful transfer
    if ($verified && $request->event == 'transfer.completed') {

        $transfer = Flutterwave::transfers()->fetch($request->data['id']);

        if($transfer['data']['status'] === 'SUCCESSFUL') {
            // update transfer status to successful in your db
        } else if ($transfer['data']['status'] === 'FAILED') {
            // update transfer status to failed in your db
            // revert customer balance back
        } else if ($transfer['data']['status'] === 'PENDING') {
            // update transfer status to pending in your db
        }

    }
  }


  
    public function handlecallback()
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        dd($data);

        }
        elseif ($status ==  'cancelled'){
            return back()->with('warning', 'transaction has been cancelled');
        }
        else{
            return back()->with('error', 'transaction has failed');
        }
        
    }

}
