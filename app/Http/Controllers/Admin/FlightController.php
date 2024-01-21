<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternationalFlight;
use App\Models\LocalFlight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdminRole:administrator')->only('update');
    }
    
    public function LocalFLight(){
        $localflight = LocalFlight::paginate(10);
        return view('admin.Flight.localflight', compact('localflight'));
    }

    public function InternationalFLight(){
        $internationalflight = InternationalFlight::paginate(10);
        return view('admin.Flight.internationalflight', compact('internationalflight'));
    }

    public function LocalFlightDelete($id){
        $localflight = LocalFlight::find($id);
        if ($localflight) {
            $localflight->delete();
            return redirect()->back()->with('success', 'Flight deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function InternationalFlightDelete($id){
        $internationalflight = InternationalFlight::find($id);
        if ($internationalflight) {
            $internationalflight->delete();
            return redirect()->back()->with('success', 'Flight deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
