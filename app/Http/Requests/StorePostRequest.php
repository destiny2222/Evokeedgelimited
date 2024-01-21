<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
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
            'title'=>['nullable','string'],
            'author'=>['nullable','string'],
            'body'=>['nullable','string'],
            // 'tag'=>['required'],
            // 'publish'=>['nullable','boolean'],
            'image'=>['image','nullable', 'mimes:jpeg,png,jpg,gif,svg']
        ];
    }

    

    public function createNewBlog(){
        try{
            // $slug  = ;
            Post::create([
                'title'=>$this->title,
                'author'=>$this->author,
                'body'=>$this->body,
                'publish'=>$this->publish ? true : false,
                'slug'=>Str::slug($this->title),
                'image'=>upload_single_image('blogger', 'image')
            ]);
            return true;
        } catch(\Exception $exception){
           Log::error($exception->getMessage());
           return false;
        }
    }
}
