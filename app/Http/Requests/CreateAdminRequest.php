<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //must be updated*
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
            'admin_name' => 'required|string|max:50',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed|string',
            'activation_code' => 'nullable',
            'phone' => 'nullable|max:30|unique:admins',
            'remember_token' => 'nullable',
        ];
    }
}
