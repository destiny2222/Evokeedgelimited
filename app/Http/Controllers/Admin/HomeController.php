<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use App\Models\CorporateService;
use App\Models\LocalFlight;
use App\Models\Merchandise;
use App\Models\OtherService;
use App\Models\User;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function __construct() {
        $this->middleware('admin');
        $this->middleware('checkAdminRole:administrator')->only('update');
    }


    public function home(){

        $admin = Auth::guard('admin')->user();
        $user_count = User::count();
        $localflight = LocalFlight::count();
        $visafee = VisaApplication::count();
        $merchandise = Merchandise::count();
        $corporateservice = CorporateService::count();
        $otherservice = OtherService::count();

        $previousMonthUserCount = User::whereYear('created_at', Carbon::now()->subMonth()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->count();

        $percentageIncrease = 0; 
        if ($previousMonthUserCount > 0) {
            $percentageIncrease = (($user_count - $previousMonthUserCount) / $previousMonthUserCount) * 100;
        }

        $previousMonthLocalFlightCount = LocalFlight::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $FlightIncrease = 0; 
        if ($previousMonthLocalFlightCount > 0) {
            $FlightIncrease = (($localflight - $previousMonthLocalFlightCount) / $previousMonthLocalFlightCount) * 100;
        }


        $previousMonthvisafeeCount = VisaApplication::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $visafeeIncrease = 0; 
        if ($previousMonthvisafeeCount > 0) {
            $visafeeIncrease = (($visafee - $previousMonthvisafeeCount) / $previousMonthvisafeeCount) * 100;
        }

        $previousMonthmerchandiseCount = Merchandise::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $merchandiseIncrease = 0; 
        if ($previousMonthmerchandiseCount > 0) {
            $merchandiseIncrease = (($merchandise - $previousMonthmerchandiseCount) / $previousMonthmerchandiseCount) * 100;
        }

        $previousMonthcorporateserviceCount = CorporateService::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $corporateserviceIncrease = 0; 
        if ($previousMonthcorporateserviceCount > 0) {
            $corporateserviceIncrease = (($corporateservice - $previousMonthcorporateserviceCount) / $previousMonthcorporateserviceCount) * 100;
        }

        $previousMonthotherserviceCount = OtherService::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $otherserviceIncrease = 0; 
        if ($previousMonthotherserviceCount > 0) {
            $otherserviceIncrease = (($otherservice - $previousMonthotherserviceCount) / $previousMonthotherserviceCount) * 100;
        }

        return view('admin.index', [
            'admin' => $admin,
            'user_count' => $user_count,
            'localflight' => $localflight,
            'FlightIncrease' => $FlightIncrease,
            'visafee' => $visafee,
            'otherservice' => $otherservice,
            'corporateservice' => $corporateservice,
            'merchandise' => $merchandise,
            'visafeeIncrease' => $visafeeIncrease,
            'otherserviceIncrease' => $otherserviceIncrease,
            'merchandiseIncrease' => $merchandiseIncrease,
            'corporateserviceIncrease' => $corporateserviceIncrease,
            'percentageIncrease' => $percentageIncrease,
        ]);
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin) {
            // $admin = Admin::where('id', $id)->first();
            $admin->update([
                // 'image'=>$image_file ?? $users->image,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            Alert::success('Updated Successfully');
            return back();
        } else {
            Alert::error('Something went Wrong');
            return back();
        }
    }




    public function validatepassword(Request  $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
        ]);
        # check for current password match
        $adminpassword = Auth::guard('admin')->user();
        if (password_verify($request->current_password, $adminpassword->password)) {
            # if true
            if ($request->new_password == $request->Confirm_password) {
                # send otp to user email and the password in datebase
                session(['new_password' => $request->new_password]);
                $adminpassword->update([
                    'password' => Hash::make(session('new_password'))
                ]);
                // dd($adminpassword);
                Alert::success('Password Change Successfully');
                return back();
            } else {
                Alert::error('Error! Password Mismatch');
                return back();
            }
        } else {
            Alert::error('Error! The password does not match the current password?');
            return back();
        }
    }
}


