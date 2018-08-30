<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDriverRequest extends FormRequest
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
            'driver_name' => 'required|string|max:50',
            'email' => 'required|email|unique:drivers',
            'phone' => 'nullable|max:30|unique:drivers',
        ];
    }
}
