<?php

namespace App\Http\Requests\Charge;

use App\Models\TransactionCharges;
use Illuminate\Foundation\Http\FormRequest;

class ChargesRequest extends FormRequest
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
            'flights_charge_amount'=>['nullable','string'],
             'tuition_charge_amount'=>['nullable','string'],
             'visa_charge_amount'=>['nullable','string'],
             'corporate_charge_amount'=>['nullable','string'],
             'merchant_charge_amount'=>['nullable','string'],
             'bdc_charge'=>['nullable','string'],
             'other_service'=>['nullable','string'],
             'deposit_charge'=>['nullable','string'],
        ];
    }

    // public function createCharge(){
    //     TransactionCharges::create($this->all());
    //     return true;
    // }
}
