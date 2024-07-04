<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role == 1;
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
            'description'=>'required|min:5|max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Başlık alanı gereklidir.',
            'description.required' => 'İçerik alanı gereklidir.',

            'name.min' => 'Başlık alanı en az 5 karakterden oluşmalıdır.',
            'description.min' => 'İçerik alanı en az 5 karakterden oluşmalıdır.',

            'name.max' => 'Başlık alanı en fazla 30 karakterden oluşmalıdır.',
            'description.max' => 'İçerik alanı en fazla 200 karakterden oluşmalıdır.',
        ];
    }
}
