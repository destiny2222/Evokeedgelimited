<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
 
        return [
            //
            'name' => ['required' ,'string'],
            'email' => ['required', 'email' , 'unique:admins'],
            'role_as' => ['required', 'string'],
            'phone' => ['required', 'string','unique:admins'],
            'password' => ['required', 'min:8'],
        ];
    }

    
    public function createAdmin(){
        // dd($this->all());
        if($this->password == $this->confirm_password){
            Admin::create([
                "name"=> $this->name,
                "email"=> $this->email,
                "role_as"=> $this->role_as,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                "phone"=> $this->phone,
                'password' => Hash::make($this['password']),
            ]);
            return true;
        } else{
            return false;  
        }
        
    }
    
}
