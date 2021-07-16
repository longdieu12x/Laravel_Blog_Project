<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\LegalQuote;
class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => [
                'required',
                'max:500',
                'unique:posts,title',
                new LegalQuote(),
            ]
            ,
            'content' => 'required|min:10',

        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => "Ngu lồn vừa thôi, :attribute chưa được nhập kìa! Submit cái địt con cụ mày à???!!!",
            'content.required' => "Ngu lồn vừa thôi, :attribute chưa được nhập kìa! Submit cái địt con cụ mày à???!!!",
        ];
    }
    public function attributes(){
        return [
            'title' => "tiêu đề bài viết",
            'content' => "nội dung bài viết",
            'Submit' => "Đăng bài",
        ];
    }
}
