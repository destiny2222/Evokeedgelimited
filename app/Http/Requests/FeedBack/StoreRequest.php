<?php

namespace App\Http\Requests\FeedBack;

use App\Models\FeedBack;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

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
        $feedback = new FeedBack;
        $feedback->name = $this->name;
        $feedback->email = $this->email;
        $feedback->message = $this->message;
        if ($feedback->save()) {
            Mail::to('sales@evokeedgelimited.com')->send(new \App\Mail\FeedBack($feedback));
        }
        return true;
    }
}
