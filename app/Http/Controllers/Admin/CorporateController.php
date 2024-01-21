<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CorporateController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdminRole:administrator')->only('update');
    }
    public function corporatePage(){
        $corporate = CorporateService::paginate(10);
        return view('admin.corporate.index', compact('corporate'));
    }


    public function corporateEdit($id){
        $corporate = CorporateService::find($id);
        return view('admin.corporate.edit', compact('corporate'));
    }

    public function corporateUpdate(Request $request, $id){
        $corporate = CorporateService::find($id);
        if ($corporate) {
            $corporate->update([
                'name' => $request->input('name'),
                'bank_name' => $request->input('bank_name'),
                'bank_address' => $request->input('bank_address'),
                'bank_account_number' => $request->input('bank_account_number'),
                'amount' => $request->input('amount'),
                'bank_swift_code' => $request->input('bank_swift_code'),
            ]);
            Alert::success('Updated Successfully');
            return redirect()->route('admin.corporate-service-page');
        } else {
            Alert::error('Failed');
            return redirect()->back();
        }
        
    }
    public function corporateDelete($id){
        $corporate = CorporateService::find($id);
        if ($corporate) {
            $corporate->delete();
            Alert::success('Deleted Successfully');
            return redirect()->route('corporate-service-page');
        } else {
            Alert::error('Failed');
            return redirect()->back();
        }
    }
}
