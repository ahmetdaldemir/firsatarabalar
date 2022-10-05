<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'phone' => 'required|numeric|min:10|unique:customers',
          //  'g-recaptcha-response' => 'required|recaptcha'
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'İsim alanı boş olamaz',
            'lastname.required' => 'Soyisim alanı boş olamaz',
            'email.required' => 'Email benzersiz olmalı',
            'password.required' => 'Şifre alanı boş olamaz',
            'phone.required' => 'Telefon numarası boş olamaz ve 10 haneli doğru telefon yazılmalı',
         ];
    }
}
