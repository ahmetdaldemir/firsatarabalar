<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiclePostRequest extends FormRequest
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
            'customer_id' => 'required',
            'brand_id' => 'required',
            'version' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'Müşteri girişi yapmak zorunludur',
            'brand_id.required' => 'Marka Seçilmedi',
            'version.required' => 'Araç seçilmedi',
        ];
    }
}
