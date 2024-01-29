<?php

namespace App\Http\Requests\Tuition;

use Illuminate\Foundation\Http\FormRequest;

class PortalRequest extends FormRequest
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
            'legal_name'=>['nullable', 'string'],
            'student_email'=>['nullable', 'string'],
            'portal_password'=>['nullable', 'string'],
            'student_id'=>['nullable', 'string'],
            'portal_link'=>['nullable', 'string'],
            'service_type'=>['nullable', 'string'],
            'college_name'=>['nullable', 'string'],
            'paid'=>['nullable', 'string'],
            'user_id'=>['nullable', 'string'],
        ];
    }
}
