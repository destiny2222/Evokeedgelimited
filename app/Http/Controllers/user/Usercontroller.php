<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Corporate\StoreRequest;
use App\Http\Requests\Flight\InternationalFlightRequest;
use App\Http\Requests\Flight\InternationalRequest;
use App\Http\Requests\Flight\LocalFlightRequest;
use App\Http\Requests\Flight\LocalRequest;
use App\Http\Requests\KycRequest;
use App\Http\Requests\Merchandise\MerchandiseRequest;
use App\Http\Requests\OtherService\StoreRequest as OtherServiceStoreRequest;
use App\Http\Requests\Tuition\PortalRequest;
use App\Http\Requests\Tuition\TuitionWrieRequest;
use App\Http\Requests\Tuition\UpdateRequest;
use App\Http\Requests\Tuition\WireTransfer;
use App\Http\Requests\UserSetting\StoreRequest as UserSettingStoreRequest;
use App\Http\Requests\VisaFee\VisaApplcationRequest;
use App\Models\Admin;
use App\Models\Baggage;
use App\Models\CorporateService;
use App\Models\Kyc;
use App\Models\Merchandise;
use App\Models\OtherService;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransactionCharges;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use App\Models\user_setting;
use App\Models\UserWallet;
use App\Models\VisaApplication;
use App\Notifications\KycNotification;
use App\Notifications\PaymentMadeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Facades\Log;

class Usercontroller extends Controller
{
    public  function storeKyc(KycRequest $request){
        if($request->createOrUpdate()){
            $kyc = Kyc::where('user_id', $request->user_id)->first();
            $kyc->getUserEmail()->notify(new KycNotification($kyc));
            return redirect()->route('dashboard-page')->with('success', 'Sent successfully! Undergoing verification');
        }else{
            return back()->with('error', 'Oops Something went Worry, try again');
        }
    }

    public function deposit()
    {
        $users = Auth::user();
        $userbalance = UserWallet::where('user_id', $users->id)->latest()->first();
        // dd($userbalance->transactions);
        return view('users.deposit.index', compact('userbalance'));
    }


    public function addBalance(){
        return view('users.deposit.add');
    }


   public function addBalanceBank(){
       return view('users.deposit.addbalance');
   }

   public function Manage(){
        return view('users.settings.manage');
    }



    public function helps(){
        return view('users.settings.helps');
    }





   public function Initiator(){
    $setting = Setting::first();
        return view('users.initiator', compact('setting'));
    }


    public function pay_school_fee(){
        return view('users.TuitionPayment.index');
    }

    public function payschoolPortalStore(PortalRequest $request){
        if(TuitionPayment::count() >= 0) {
            // TuitionPayment::first()->update($request->validated());
            TuitionPayment::create($request->validated());
        }
        return redirect()->route('school.portal');
    }
    
    public function payschoolPortal(){
        $portal = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
        // dd($portal->college_name);
        return view('users.TuitionPayment.portal',compact('portal'));
    }


    public function paymentTuiton(UpdateRequest $request){
        if(TuitionPayment::count() > 0){
            $tuition = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
            $tuition->update($request->validated());
        }else{
            TuitionPayment::create($request->validated());
        }
        return redirect()->route('portal-payment');
    }


    public function tuitionpaymentView(){
        $pay = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
        // user wallet
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();
        // transaction charge
        $charge = TransactionCharges::select('tuition_charge_amount')->first();
        // total precentage charge
        $totalprecentage =  ($charge->tuition_charge_amount / 100) * $pay->amount;
        // total
        $totalPay = $pay->amount + $totalprecentage;

        return view('users.TuitionPayment.paymenttution',compact('pay','charge','totalPay', 'wallet'));
    }


    


    public function tuitionviaTransfer(TuitionWrieRequest $request){
        // dd($request->validated());
        if(TuitionPaymentWire::count() >= 0){
          TuitionPaymentWire::create($request->validated());
        }
        return  redirect()->route('tuition.wire.transfer');
    }


    public function wireTransfer(){
        $tuition = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
        if($tuition == null){
            return redirect()->route('pay_school_fee-page');
        }
        return view('users.TuitionPayment.wireTransfer', compact('tuition'));
    }


   public function tuitionwire(TuitionWrieRequest $request){
      if(TuitionPaymentWire::count() > 0){
        $tuitionwire = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
        $tuitionwire->update($request->validated());
      }else{
        TuitionPaymentWire::create($request->validated());
      }
      return redirect()->route('tuition.wire.payment');
   }

   public function tuitionwirepaymentView(){
        $pay = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
        // user wallet
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();
        // transaction charge
        $charge = TransactionCharges::select('tuition_charge_amount')->first();
        // total precentage
        $totalprecentage =  ($charge->tuition_charge_amount / 100) * $pay->amount;
        // total 
        $totalPay = $pay->amount + $totalprecentage;
        

        return view('users.TuitionPayment.paymentwire',compact('pay','charge','totalPay', 'wallet'));
    }



    public function Vise(){
        return  view('users.visa.index');
      }
  
   
  
     public function CanadaVisa(){
          return view('users.visa.canada_visa');
     }
  
     public function UsVisa(){
        return view('users.visa.us_visa');
     }


     public function storeApplication(VisaApplcationRequest $request)
     {
         if ($request->createApplication()) {
             return redirect()->route('pay-page');   
         }else{
             return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
         }
     }


     public function usPay(){
        $pay = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
        // transaction charge
        $charge = TransactionCharges::select('visa_charge_amount')->first();
        // user wallet
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();
        // total precentage
        $totalprecentage = ($charge->visa_charge_amount / 100) * $pay->visa_fee_amount;


        $totalprecentages = $pay->visa_fee_amount + $totalprecentage;
        if ($pay) {
            $pay->update([
                'total_charge'=>$totalprecentages,
            ]);
        }
        return view('users.visa.payment',compact('pay','charge', 'wallet'));
    }


    public function  flight(){
        return view('users.Flight.index');
      }

    public function InternationalFlight(){
        $baggage = Baggage::all();
        foreach($baggage as $baggages)
        return view('users.Flight.international', compact('baggages'));
    }


    public function LocalFlight(){
        $baggage = Baggage::all();
        return view('users.Flight.local', compact('baggage'));
    }


    public function  flightInternationalBooking(InternationalRequest $request){
        if ($request->createFlightBooking()) {
           return redirect()->route('flight-page')->with('success','Sent Successfully!! We get back to you as soon as possible');
        }
        return redirect()->route('international-flight-page')->with('error','Something went wrong');
     }


    public function flightLocalBooking(LocalRequest $request){
        if ($request->createLocal()) {
            return redirect()->route('flight-page')->with('success', 'Sent Successfully!! We get back to you as soon as possible');
        }else{
            return redirect()->route('local-flight-page')->with('error', 'Something went wrong');
        }
    }


    public  function Corporate(){
        return view('users.Corporate.index');
    }

    public function store(StoreRequest $request){
        if ($request->createService()) {
            return redirect()->route('corporate-payment-page');
        } else {
            return back()->with('error','an error occurred');
        }
    }


    public function paymentPay(){
        $pay =  CorporateService::where('user_id', auth()->user()->id)->latest()->first();
        // charge transaction
        $charge = TransactionCharges::select('corporate_charge_amount')->first();
        // total charge transaction
        $totalprecentage = ($charge->corporate_charge_amount / 100) * $pay->amount;
        // user wallet 
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();

        // dd($totalprecentage);
        $totalprecentages = $pay->amount + $totalprecentage;
        if($pay){
            $pay->update([
                'total_amount'=>$totalprecentages
            ]);
        }
        return view('users.Corporate.payment', compact('pay', 'totalprecentages', 'charge', 'wallet'));
    }


    public function Merchandise() {
        return view('users.merchandise.index');
    }

    public function merchandiseStore(MerchandiseRequest $request){
        if ($request->createMerhance()) {
            return redirect()->route('merchandise.pay');
        }else{
            return back()->with('error', 'Something went wrong');
        }
    } 

    public function MerchandisePay(){
        $pay = Merchandise::where('user_id', auth()->user()->id)->latest()->first();
        // Wallet payment
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();
        // charge transaction
        $charge = TransactionCharges::select('merchant_charge_amount')->first();
        // total charge transaction
        $totalprecentage = ($charge->merchant_charge_amount / 100) * $pay->amount;

        $Totalamount = $pay->amount + $totalprecentage;
        if ($pay) {
            $pay->update([
                'total_amount'=>$Totalamount,
            ]);
        }
        return view('users.merchandise.payment', compact('pay', 'charge', 'wallet'));
    }




    public function otherservice(){
        return view('users.otherservice.index');
    }

    public function storeOtherservice(OtherServiceStoreRequest  $request){
        if ($request->storeService()) {
            return  redirect()->route('otherservice.pay');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function otherPay(){
        $pay = OtherService::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::select('other_service')->first();
        $wallet = UserWallet::where('user_id', auth()->user()->id)->where('amount', '!=', null)->first();
        $totalprecentage = ($charge->other_service / 100) * $pay->amount;

        $ToatalAmount =  $pay->amount + $totalprecentage;
        
        if($pay){
            $pay->update([
                'total_amount'=>$ToatalAmount,
            ]);
        }
        return view('users.otherservice.pay', compact('pay', 'charge', 'wallet'));
    }

    public function userSettings(UserSettingStoreRequest $request){
        if($request->createOrUpdate()){
            return back()->with('success' , 'Updated successfully');
        } else {
            return back()->with('error' , 'Something went wrong');
        }
        
    }
    

}
