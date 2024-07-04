<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:5|string|max:30',
            'email'=>'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'İsim alanı gereklidir.',
            'email.required' => 'Email alanı gereklidir.',

            'name.min' => 'İsim alanı en az 5 karakterden oluşmalıdır.',
            'email.email' => 'Email alanı geçerli değil.',

            'name.max' => 'Başlık alanı en fazla 30 karakterden oluşmalıdır.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Doğrulama hatası',
            'errors' => $errors
        ], 422));
    }
}
