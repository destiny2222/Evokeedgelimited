<?php

namespace App\Http\Requests\UserSetting;

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
            'announcement'=>['nullable', 'boolean'],
            'platform_update'=>['nullable', 'boolean'],
            'email_notification'=>['nullable', 'boolean'],
            'user_id'=>['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'announcement' => (bool) $this->announcement,
            'platform_update' => (bool) $this->platform_update,
            'email_notification' => (bool) $this->email_notification,
            'user_id' => (bool) $this->user_id,
        ]);
    }
}
