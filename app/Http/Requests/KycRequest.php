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

    public function createOrUpdate() {
        $existingKyc = Kyc::where('user_id', auth()->user()->id)->latest()->first();
    
        if ($existingKyc) {
            $existingKyc->update([
                'gender' => $this->input('gender'),
                'marital_status' => $this->input('marital_status'),
                'date_birth'=> $this->input('date_birth'),
                'nationality'=> $this->input('nationality'),
                'proof_of_address'=>update_image('kyc/proof/', $existingKyc->proof_of_address, 'proof_of_address'),
                'documents'=>update_image('kyc/document/', $existingKyc->documents, 'documents'),
                'street_address'=>$this->input('sreet_address'),
                'street_address_2'=>$this->input('sreet_address_2'),
                'status'=>$this->input('status'),
                'data_sign'=>$this->input('data_sign'),
                'kyc_status'=>$this->input('kyc_status'),
                'user_id'=>$this->user_id
            ]);
        } else {
            Kyc::create([
                'gender' => $this->gender,
                'marital_status' => $this->marital_status,
                'date_birth'=> $this->date_birth,
                'nationality'=> $this->nationality,
                'proof_of_address'=>upload_single_image('kyc/proof/', 'proof_of_address'),
                'documents'=>upload_single_image('kyc/document/',  'documents'),
                'street_address'=>$this->street_address,
                'street_address_2'=>$this->street_address_2,
                'status'=>$this->status,
                'data_sign'=>$this->data_sign,
                'kyc_status'=>$this->kyc_status,
                'user_id'=>$this->user_id
            ]);
        }
        return true;
    }
}
