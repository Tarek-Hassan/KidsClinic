<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'age' => 'required|numeric',
            'blood_type'=>'required',
            'birth_type'=>'required',
            'number' => 'required|numeric',
            'dad_job' => 'required|string|max:255',
            'mum_job' => 'required|string|max:255',
            'address' => 'string|max:255',
            'phone'=>'max:14',
            'notes'=>'max:500',


    ];
    }

}

    

