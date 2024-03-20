<?php

namespace App\Http\Requests\Merchandise;

use App\Models\Merchandise;
use Illuminate\Foundation\Http\FormRequest;

class MerchandiseRequest extends FormRequest
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
            'description' =>'nullable|string',
            'currency' =>'nullable|string',
          'seller_name' =>'nullable|string',
            'email_supplier' =>'nullable|string',
            'bank_amount_name' =>'nullable|string',
            'paid' =>'nullable|string',
            'bank_account_number' =>'nullable|string',
            'bank_swift_code' =>'nullable|string',
            'bank_route_number' =>'nullable|string',
            'bank_reference_number' =>'nullable|string',
            'recipient' =>'nullable|string',
            'country' =>'nullable|string',
            'city' =>'nullable|string',
            'postcode' =>'nullable|string',
            'payment_method' =>'nullable|string',
            'amount' =>'nullable|numeric',
        ];
    }

    public function createMerhance(){
       
        Merchandise::create([
            'description' => $this->description,
            'currency' => $this->currency,
            'seller_name' => $this->seller_name,
            'email_supplier' => $this->email_supplier,
            'bank_amount_name' => $this->bank_amount_name,
            'bank_account_number' => $this->bank_account_number,
            'bank_swift_code' => $this->bank_swift_code,
            'bank_route_number' => $this->bank_route_number,
            'bank_reference_number' => $this->bank_reference_number,
            'recipient' => $this->recipient,
            'country' => $this->country,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'payment_method' => $this->payment_method,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
        ]);
        return true;
    }
}
