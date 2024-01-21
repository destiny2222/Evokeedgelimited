<?php

namespace App\Http\Requests\UserWallet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWallet extends FormRequest
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
          'name' =>'required'|'string',
          'balance' =>'required'|'decimal',
          'amount' =>'required'|'integer',
          'status' =>'required'|'boolen',
        ];
    }
}
