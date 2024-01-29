<?php

namespace App\Http\Requests\VisaFee;

use App\Models\VisaApplication;
use Illuminate\Foundation\Http\FormRequest;

class VisaApplcationRequest extends FormRequest
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
           
            'name' =>'nullable|string',
            'case_number' =>'nullable|string',
            'invoice_id' =>'nullable|string',
            'visa_fee_amount' =>'required|numeric',
            'total_charge' =>'nullable|numeric',
            'visa_website_link' =>'nullable|string',
            'user_password' => 'nullable|string',
            'username' =>'nullable|string',
            'visa_type' =>'nullable|string',
            'user_id'=>'required|string'
        ];
    }


    public function createApplication(){
           VisaApplication::create([
            'name'=>$this->name,
            'case_number'=>$this->case_number,
            'invoice_id'=>$this->invoice_id,
            'visa_fee_amount'=>$this->visa_fee_amount,
            'total_charge' => $this->total_charge,
            'visa_website_link' => $this->visa_website_link,
            'user_password' => $this->user_password,
            'username' => $this->username,
            'visa_type' => $this->visa_type,
            'user_id' => $this->user_id,
           ]);
           return true;
    }
}
