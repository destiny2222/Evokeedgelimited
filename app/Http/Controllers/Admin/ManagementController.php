<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ManagementController extends Controller
{
    public function __construct(){
        $this->middleware('checkAdminRole:administrator')->only('update');
    }
    
    public function UserManagement(){
        $user = User::orderBy('id', 'desc')->paginate(10);
        $userpendingbalance = UserWallet::all();
        return view('admin.useradmin.user',compact('user', 'userpendingbalance'));
    }


    public function retentionUser(){
        $user = User::orderBy('id', 'desc')->paginate(10);
        $userpendingbalance = UserWallet::all();
        return view('admin.retention.user.index',compact('user', 'userpendingbalance'));
    }


    public function editUser($id){
        $user = User::find($id);
        $useramount = 0;
        if (!$user->userwallet == null ) {
            $useramount += $user->userwallet->amount;
        }else {
            $useramount;
        }
        return view('admin.useradmin.user-edit',[
            'user'=>$user,
            'useramount'=>$useramount,
        ]);
    }


    public function updateUser(Request $request, $id){
            $user = User::find($id);
    
            if(!$user) {
                Alert::info('error', 'User record not found');
                return redirect()->back();
            }
    
            if($request->hasFile('image')) {
                $image_file = time().'.'.$request->image->extension();
                $request->image->move(public_path('/'),$image_file);
            } else {
                $image_file = $user->image; 
            }
    
            // Update user data
            $user->update([
                'image' => $image_file,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'state' => $request->state,
                'city' => $request->city,
                'country' => $request->country,
                'address' => $request->address,
                'referrence_id' => $request->referrence_id,
            ]);
    
            // Update userwallet amount if it exists
            if ($user->userwallet) {
                $user->userwallet->update([
                    'amount' => $request->input('userwallet_amount'), 
                ]);
            }else{
               UserWallet::create([
                  'user_id'=>$user->id,
                  'name'=>$user->name,
                  'amount' => $request->input('userwallet_amount'),
               ]);
            }
            return redirect()->route('admin.user-page')->with('success', 'Edited Successfully');
        
    }
    



    public function deleteUser($id){
            $user = User::findOrFail($id);
            if ($user) {
                $user->delete();
                return back()->with('success', 'Successfuly Delete');
            } else {
                return back()->with('error', 'Oops Something went worry!');
            }
    }

    public function banUser($id)
    {
        $user = User::find($id);
        $user->update(['is_banned' => true]);
        return redirect()->route('admin.user-page')->with('success', 'Successfuly Banned');
    }

    public function unbanUser($id)
    {
        $user = User::find($id);
        $user->update(['is_banned' => false]);
        return redirect()->route('admin.user-page')->with('success', 'Successfuly Unbanned');
    }


    public function adminUserEdit(Request $request, $id){
        $adminUserEdit = Admin::find($id);
        if ($adminUserEdit){
            $adminUserEdit->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'role_as'=>$request->input('role_as'),
            ]);
            $adminUserEdit->save();
            return back()->with('success', 'Successfully updated');
        }else{
            return back()->with('error', 'Oops something went error');
        }
    }


    public function adminUserChangePassword(Request $request){
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
        ]);
        $id = $request->input('id');
        $adminpassword = Admin::find($id);
        if (password_verify($request->current_password, $adminpassword->password)) {
                if ($request->new_password == $request->Confirm_password) {
                    session(['new_password' => $request->new_password]);
                    $adminpassword->update([
                        'password' => Hash::make(session('new_password'))
                    ]);
                    return back()->with('Password Change Successfully');
                } else {
                    return back()->with('Error! Password Mismatch');
                }
            } else {
                return back()->with('Error! The password does not match the current password?');
            }
    }
    public function adminUserDelete($id){
        $adminUserDelete = Admin::find($id);
        if($adminUserDelete){
            $adminUserDelete->delete();
            return back()->with('success', 'Successfuly Delete');
        }else{
            return back()->with('error', 'Oops Something went worry!');
        }
    }


    public function updateBalances(Request $request){
        $userspendingbalance = UserWallet::where('balance', '>',  0)->get();
        if($userspendingbalance->isEmpty()){
            return back()->with('error', 'There is no pending balance to update.');
        } else {
            foreach ($userspendingbalance as $wallet) {
                $wallet->update([
                    'amount' => $wallet->amount + $wallet->balance,
                    'balance' => 0,
                ]);
            }
            return back()->with('success', 'Pending balance updated successfully.');
        }
    }
    
}
