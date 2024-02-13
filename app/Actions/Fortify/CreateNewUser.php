<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone'=>['required', 'string', 'min:10'],
            'country'=>['required', 'string'],
            'address'=>['nullable', 'string'],
            // 'username'=>[
            //     'required', 
            //     'string',
            //     'max:10',
            //     Rule::unique(User::class),
            // ],
            'referrence_id'=>['nullable', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $randomNumber = 'EE' . rand(10000000, 99999999);
        return User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'country' => $input['country'],
            // 'last_name' => $input['last_name'],
            // 'city' => $input['city'],
            // 'state' => $input['state'],
            'address' => $input['address'],
            'email' => $input['email'],
            'referrence_id'=>$randomNumber,
            'password' => Hash::make($input['password']),
        ]);

        // $token = Str::random(64);
  
        // UserVerify::create([
        //     'user_id' => $createuser->id, 
        //     'token' => $token
        // ]);

        // $createuser->notify()
  
        // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
        //       $message->to($request->email);
        //       $message->subject('Email Verification Mail');
        //   });
    }
}
