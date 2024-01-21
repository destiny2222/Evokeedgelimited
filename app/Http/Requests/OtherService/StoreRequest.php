<?php

namespace App\Http\Requests\OtherService;

use App\Models\OtherService;
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
            'funds' =>'nullable|string',
            'amount' =>'nullable|numeric',
            'beneficiary' =>'nullable|string',
            'holder' =>'nullable|string',
            'account_number' =>'nullable|numeric',
            'swift_code' =>'nullable|string',
            'route_number' =>'nullable|numeric',
            'reference_number' =>'nullable|string',
        ];
    }

    public function storeService(){
        OtherService::create([
            'funds'=>$this->funds,
            'amount'=>$this->amount,
            'beneficiary'=>$this->beneficiary,
            'holder'=>$this->holder,
            'account_number'=>$this->account_number,
           'swift_code'=>$this->swift_code,
            'route_number'=>$this->route_number,
           'reference_number'=>$this->reference_number,
            'user_id'=>$this->user_id,
        ]);
        return true;
    }
}
