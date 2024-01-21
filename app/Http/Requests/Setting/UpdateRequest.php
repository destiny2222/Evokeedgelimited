<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'visa' =>'nullable|boolean',
            'tuition_payment' =>'nullable|boolean',
            'flight_booking' =>'nullable|boolean',
            'corporate_service' =>'nullable|boolean',
            'merchandise_payment' =>'nullable|boolean',
            'other_service' =>'nullable|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'visa' => (bool) $this->visa,
            'tuition_payment' => (bool) $this->tuition_payment,
            'flight_booking' => (bool) $this->flight_booking,
            'corporate_service' => (bool) $this->corporate_service,
            'merchandise_payment' => (bool) $this->merchandise_payment,
            'other_service' => (bool) $this->other_service,
        ]);
    }
}
