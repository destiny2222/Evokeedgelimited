<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function createNewAdmin(StoreAdminRequest $request){
      // dd($request->all());
        if($request->createAdmin()){
          Alert::success('Created Successfully');
          return back();
        }else{
          Alert::error('Oops something went worry!');
          return back();
        }
  }


  public function register(){
    return view('admin.auth.register');
  }
}
