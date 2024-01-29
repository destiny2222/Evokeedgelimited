<?php

namespace App\Http\Requests\Tuition;

use Illuminate\Foundation\Http\FormRequest;

class TuitionWrieRequest extends FormRequest
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
            'legal_name'=>['nullable','string'],
            'account_number'=>['nullable','string'],
            'routing_number'=>['nullable','string'],
            'student_id'=>['nullable','string'],
            'bank_swift_code'=>'nullable','string',
            'school_iban'=>['nullable','string'],
            'student_email'=>['nullable','string','email'],
            'school_address'=>'nullable','string',
            'service_type'=>['nullable','string'],
            'college_name'=>['nullable','string'],
            'amount'=>['nullable','integer'],
            'user_id'=>['nullable', 'string'],
        ];
    }
}
