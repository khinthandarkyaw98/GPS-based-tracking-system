<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //must be updated ***
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
            'driver_name' => 'required|string|max:50',
            //'vehicle_id' => 'nullable|string|unique:drivers',
            'email' => 'required|email|unique:drivers',
            //'password' => 'required|min:6|confirmed|string',
            'password' => 'required|min:6|string',
            //'activation_code' => 'nullable',
            'phone' => 'nullable|max:30|unique:drivers',
            //'remember_token' => 'nullable',

        ];
    }
}
