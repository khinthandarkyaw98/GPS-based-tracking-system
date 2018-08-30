<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
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
            'vehicle_name' => 'required|string|max:50',
            'vehicle_number' => 'required|string|max:50|unique:vehicles',
            'driver_id' => 'nullable|unique:vehicles',
            'gps_model' => 'string',
            'sim_number' => 'required|unique:vehicles',
            'imei' => 'required|unique:vehicles',
            'description' => 'nullable|max:50',
        ];
    }
}
