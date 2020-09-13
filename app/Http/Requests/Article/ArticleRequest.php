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
            
//           'ar_name'=>'required|regex:/^[\x{0621}-\x{064A}]+$/u',   
//             'en_name'=>'required|regex:/^[A-Za-z0-9 _]+$/',

            // 'body' => 'max:255'
    ];
    }
}
