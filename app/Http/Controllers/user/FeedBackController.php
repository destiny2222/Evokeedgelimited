<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedBack\StoreRequest;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function StoreFeedBack(StoreRequest $request){
         if ($request->createHelp()) {
            return back()->with('success', 'Feedback Sent Successfully');
         } else {
            return back()->with('error', 'Something went wrong');
         }
         
    }
}
