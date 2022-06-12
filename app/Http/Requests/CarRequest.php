<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'brand_id'    => 'required|max:5',
            'model_id'    => 'required|max:5',
            'name'        => 'required|max:50',
            'fueltype'    => 'required|max:50',
            'transmission'=> 'required|max:50',
            'bodytype'    => 'required|max:5*',
            'engine'      => 'required|max:50',
            'horse'       => 'required|max:50',
            'production_start'=> 'required|max:50',
            'production_end'  => 'required|max:50',
            'status'          => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'brand_id.required'    => 'required|max:5',
            'model_id.required'    => 'required|max:5',
            'name.required'        => 'required|max:50',
            'fueltype.required'    => 'required|max:50',
            'transmission.required'=> 'required|max:50',
            'bodytype.required'    => 'required|max:5*',
            'engine.required'      => 'required|max:50',
            'horse.required'       => 'required|max:50',
            'production_start.required'=> 'required|max:50',
            'production_end.required'  => 'required|max:50',
            'status.required'          => 'required|max:50',
        ];
    }
}
