<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateService;
use App\Models\InternationalFlight;
use App\Models\Kyc;
use App\Models\LocalFlight;
use App\Models\Merchandise;
use App\Models\OtherService;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use App\Models\User;
use App\Models\VisaApplication;
use Illuminate\Http\Request;

class RetentionController extends Controller
{

    public function retentedUserDetails($id){
        $user = User::find($id);
        $tuition = TuitionPayment::where('user_id', $user->id)->paginate(10);
        $tuitionwire = TuitionPaymentWire::where('user_id', $user->id)->paginate(10);
        $corporate = CorporateService::where('user_id', $user->id)->get();
        $visaapplication = VisaApplication::where('user_id', $user->id)->where('visa_type', 'usa')->paginate(10);
        $visaapplicationcanda = VisaApplication::where('user_id', $user->id)->where('visa_type', 'canada')->paginate(10);
        $merchandise = Merchandise::where('user_id', $user->id)->paginate(10);
        $otherservice = OtherService::where('user_id', $user->id)->paginate(10);
        $kyc = Kyc::where('user_id', $user->id)->get();
        $localflight = LocalFlight::where('user_id', $user->id)->paginate(10);
        $internationalflight = InternationalFlight::where('user_id', $user->id)->paginate(10);
        return view('admin.retention.user.user_details',[
            'tuition'=>$tuition,
            'tuitionwire'=>$tuitionwire,
            'corporate'=>$corporate,
            'visaapplication'=>$visaapplication,
            'visaapplicationcanda'=>$visaapplicationcanda,
            'merchandise'=>$merchandise,
            'otherservice'=>$otherservice,
            'kyc'=>$kyc,
            'localflight'=>$localflight,
            'internationalflight'=>$internationalflight,
        ]);
    }
    
}
