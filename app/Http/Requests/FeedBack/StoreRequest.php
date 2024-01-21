<?php

namespace App\Http\Requests\FeedBack;

use App\Models\FeedBack;
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
            'name' =>'required',
            'email' =>'required',
            'message' =>'required',
        ];
    }


    public function createHelp(){
        FeedBack::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        return true;
    }
}
