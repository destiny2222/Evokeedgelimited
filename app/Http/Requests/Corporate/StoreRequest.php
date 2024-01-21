<?php

namespace App\Http\Requests\Corporate;

use App\Models\CorporateService;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'bank_name' =>'nullable|string',
            'bank_address' =>'nullable|string',
            'bank_account_number' =>'nullable|string',
            'amount' =>'nullable|numeric|integer',
            'bank_swift_code' =>'nullable|string',
        ];
    }

    public function createService(){
        CorporateService::create([
            'name' => $this->name,
            'bank_name' => $this->bank_name,
            'bank_address' => $this->bank_address,
            'bank_account_number' => $this->bank_account_number,
            'amount' => $this->amount,
            'bank_swift_code' => $this->bank_swift_code,
            'user_id' => $this->user_id
        ]);
        return true;
    }
}
