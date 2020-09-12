<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the Article is authorized to make this request.
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
            // 'profile'=>'image|mimes:jpeg,bmp,png',
            'title' => 'required',
            'body' => 'required'
            // 'title' => 'required|regex:/^[\d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui',
            // 'body' => 'required|regex:/^[\d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui'
            // 'body' => 'max:255'
    ];
    }
}
