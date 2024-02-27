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
use App\Models\VisaApplication;
use Illuminate\Http\Request;

class RetentionController extends Controller
{
    public function tuition(){
        $tuition = TuitionPayment::orderBy('id', 'desc')->paginate(10);
        return view('admin.retention.tuition.index', compact('tuition'));
    }
    public function tuitionWire(){
        $tuition = TuitionPaymentWire::orderBy('id', 'desc')->paginate(10);
        return view('admin.retention.tuition.wiretransfer', compact('tuition'));
    }

    
    public function corporate(){
        $corporate = CorporateService::paginate(10);
        return view('admin.retention.corporate.index', compact('corporate'));
    }

    public function visaApplicationVisa(){
        $visaapplication = VisaApplication::where('visa_type', 'usa')->paginate(10);
        return view('admin.retention.visaapplication.visa', compact('visaapplication'));
    }
    public function visaApplicationV(){
        $visaapplication = VisaApplication::where('visa_type', 'canada')->paginate(10);
        return view('admin.retention.visaapplication.canada',compact('visaapplication'));
    }

    public function indexMerchande(){
        $merchandise = Merchandise::paginate(10);
        return view('admin.retention.merchandise.index', compact('merchandise'));
    }

    public function otherServicepage(){
        $otherservice = OtherService::orderBy('id', 'desc')->paginate(10);
        return view('admin.retention.otherservice.index', compact('otherservice'));
    }


    public function kycretention(){
        $kyc = Kyc::orderBy('id', 'desc')->get();
        return view('admin.retention.kyc.index', compact('kyc'));
    }

    public function LocalFLight(){
        $localflight = LocalFlight::paginate(10);
        return view('admin.retention.flight.localflight', compact('localflight'));
    }

    public function InternationalFLight(){
        $internationalflight = InternationalFlight::paginate(10);
        return view('admin.retention.flight.internationalflight', compact('internationalflight'));
    }
}
