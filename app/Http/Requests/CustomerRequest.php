<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'firstname' => 'required|max:50',
            'lastname'  => 'required|max:50',
            'phone'     => 'required|numeric|digits:10',
            'email'     => 'required|email|unique:customers',
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'İsim alanı boş bırakılamaz',
            'lastname.required'  => 'Soyisim alanı boş bırakılamaz',
            'phone.required'     => 'Telefon 10 Haneli Olmak Zorundadır',
            'email.required'     => 'Daha Önce mail adresi kullanılmıştır.',
        ];
    }
}
