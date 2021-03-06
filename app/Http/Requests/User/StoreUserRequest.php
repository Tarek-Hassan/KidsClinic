<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'profile'=>'image|mimes:jpeg,bmp,png',
            'mobile'=>'string|max:14',
            'national_id'=>'string|max:14',
            'password' => 'required|string|min:8|confirmed',
            'role'=>'between:0,2'

    ];
    }
    // public function messages()
    // {
    //     return [
    //         'street_name.min'=>'Street Name SHOULD BE MORE THAN 3 CHAR',
    //         'street_name.required'=>'Street Name IS REQUIRED (NOT EMPTY)',

    //         'building_number.numeric'=>'Building Number SHOULD BE NUMERIC',
    //         'building_number.required'=>'Building Number IS REQUIRED (NOT EMPTY)',

    //         'floor_number.numeric'=>'Floor Number SHOULD BE NUMERIC',
    //         'floor_number.required'=>'Floor Number IS REQUIRED (NOT EMPTY)',

    //         'flat_number.numeric'=>'Flat Number SHOULD BE NUMERIC',
    //         'flat_number.required'=>'Flat Number IS REQUIRED (NOT EMPTY)',
    //     ];
    // }
}
