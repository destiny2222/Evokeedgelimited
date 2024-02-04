<?php

namespace App\Http\Requests;

use App\Models\Kyc;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class KycRequest extends FormRequest
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
            'gender'=> ['nullable','string'],
            'marital_status'=>['nullable', 'string'],
            'date_birth'=>['nullable','date'],
            'nationality'=>['nullable','string'],
            'documents'=>['nullable','file','mimes:png,jpg,jpeg,pdf'],
            'proof_of_address'=>['nullable','file', 'mimes:png,jpg,jpeg,pdf'],
            'street_address'=>['nullable','string'],
            'street_address_2'=>['nullable','string'],
            'status'=>['nullable','string'],
            'data_sign'=>['nullable', 'date'],
            'kyc_status'=>['nullable','string'],
            'user_id'=>['required','string'],
        ];
    }
}
