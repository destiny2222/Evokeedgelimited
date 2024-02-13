<?php

namespace App\Http\Requests\UserSetting;

use App\Models\user_setting;
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
            'user_id'=>['required','string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'announcement' => (bool) $this->announcement,
            'platform_update' => (bool) $this->platform_update,
            'email_notification' => (bool) $this->email_notification,
        ]);
    }


    public function createOrUpdate()
    {
        $user_id = $this->user()->id;
    
        $userSettings = user_setting::where('user_id', $user_id)->latest()->first();
    
        $data = [
            'announcement' => $this->input('announcement', false),
            'platform_update' => $this->input('platform_update', false),
            'email_notification' => $this->input('email_notification', false),
            'user_id' => $user_id,
        ];
    
        if ($userSettings) {
            $userSettings->update($data);
        } else {
            user_setting::create($data);
        }
    
        return true;
    }
    
}
