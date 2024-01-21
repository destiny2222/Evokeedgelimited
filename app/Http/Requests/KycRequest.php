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
            'gender'=> ['nullable','in:male,female'],
            // 'approve_status'=>['nullable','string'],
            'marital_status'=>['nullable', 'string', 'in:single,married'],
            'date_birth'=>['nullable','date'],
            'nationality'=>['nullable','string'],
            'proof_of_address'=>['nullable', 'mimes:png,jpg,jpeg,pdf'],
            'street_address'=>['nullable','string'],
            'street_address_2'=>['nullable','string'],
            'status'=>['nullable','string', 'in:resident_individual,none_resident,foreign'],
            'documents'=>['nullable','mimes:png,jpg,jpeg,pdf'],
            // 'signature'=>['nullable','mimes:png,jpg,jpeg'],
            'data_sign'=>['nullable','string'],
        ];
    }

    public function createKyc(){
        
        try {
            
            Kyc::create([
                'gender'=>$this->gender,
                'marital_status'=>$this->marital_status,
                'date_birth'=>$this->date_birth,
                'nationality'=>$this->nationality,
                'proof_of_address'=>upload_single_image('kyc/proof',  'proof_of_address'),
                'street_address'=>$this->street_address,
                'street_address_2'=>$this->street_address_2,
                'status'=>$this->status,
                'documents'=>upload_single_image('kyc', 'documents'),
                // 'signature'=>upload_single_image('kyc/signature', 'signature'),
                'data_sign'=>$this->data_sign,
                'user_id'=>$this->user_id,
                // 'approve_status'=>$request->approve_status,
            ]);
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
