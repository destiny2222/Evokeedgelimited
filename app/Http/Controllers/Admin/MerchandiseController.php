<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerchandiseController extends Controller
{
  public function __construct(){
    $this->middleware('checkAdminRole:administrator')->only('update');
}
    public function indexMerchandise(){
        $merchandise = Merchandise::paginate(10);
        return view('admin.merchandise.index', compact('merchandise'));
    }




  public function MerchandiseCompleted(Request $request, $id){
    $merchandise = Merchandise::find($id);
      if ($merchandise) {
        // $merchandise->update(['done' => $request->has('done') ? 1 : 0]);
          $done = $request->input('done'); 
          $merchandise->update(['done'=> $done]);
          Alert::success('Aply Successful');
          return back();
      } else {
          Alert::error('Something went wrong');
          return back();
      }
      
  }



  public function MerchandiseDelete($id){
      $merchandise = Merchandise::find($id);
      if ($merchandise) {
        $merchandise->delete();
            Alert::success('success', 'Deleted successfully');
            return back();
        } else {
            Alert::error('error', 'Failed to delete');
            return back();
        }
  }

}
