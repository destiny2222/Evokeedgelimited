<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OtherService;
use App\Notifications\InvoiceOther;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OtherServiceController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdminRole:administrator')->only('update');
    }
    public function otherServicepage(){
        $otherservice = OtherService::orderBy('id', 'desc')->paginate(10);
        return view('admin.otherservice.index', compact('otherservice'));
    }




  public function otherServiceCompleted(Request $request, $id){
    $otherservice = OtherService::find($id);
      if ($otherservice) {
          $done = $request->input('done');
          $otherservice->update(['done'=> $done]);
        //   $otherservice->user->notify(new InvoiceOther($otherservice));
          Alert::success('Aply Successful');
          return back();
      } else {
          Alert::error('Something went wrong');
          return back();
      }
      
  }



  public function otherServiceDelete($id){
      $otherservice = OtherService::find($id);
      if ($otherservice) {
        $otherservice->delete();
            Alert::success('success', 'Deleted successfully');
            return back();
        } else {
            Alert::error('error', 'Failed to delete');
            return back();
        }
  }

}
