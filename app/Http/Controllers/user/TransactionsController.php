<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function TransactionHistory(){
        $tuitionpayment = TuitionPayment::where('user_id', auth()->user()->id)->paginate(2)->appends(request()->query());

        $tuitionpaymentwire = TuitionPaymentWire::where('user_id', auth()->user()->id)->paginate(2)->appends(request()->query());       
        $transactions = [];

        foreach ($tuitionpayment as $tuitionpayments) {
            $transaction = [
                'date' => $tuitionpayments->created_at->format('m-d-y h:s A'),
                'type' => 'Tuition Payment School Portal',
                'reference'=> $tuitionpayments->user->referrence_id,
                'amount' => $tuitionpayments->amount,
                'done'=>$tuitionpayments->done,
            ];
            $transactions[] = $transaction;
        }

        foreach ($tuitionpaymentwire as $tuitionpaymentwires) {
            $transaction = [
                'date' => $tuitionpaymentwires->created_at->format('m-d-y h:s A'),
                'type' => 'Tuition Payment Wire Transfer ',
                'reference'=> $tuitionpaymentwires->user->referrence_id,
                'amount' => $tuitionpaymentwires->amount,
                'status'=>$tuitionpaymentwires->status,
                'done'=>$tuitionpaymentwires->done,
            ];
            $transactions[] = $transaction;
        }

        usort($transactions, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        // dd($transactions);
        return view('users.settings.manage', compact('transactions','tuitionpayment','tuitionpaymentwire'));
    }
}
