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
            'price_min' => 'required',
            'price_max' => 'required',
         ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required' => 'Müşteri girişi yapmak zorunludur ',
            'price_min.required' => 'En düşük Fiyat Belirtilmelidir.',
            'price_max.required' => 'En Yüksek Fiyat Belirtilmelidir',
         ];
    }
}
