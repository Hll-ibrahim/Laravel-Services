<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'description'=>'required|min:5|max:200',
            'category_id'=>'required|exists:categories,id',
            'priority_id'=>'required|exists:priorities,id',
            'status_id'=>'required|exists:statuses,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Başlık alanı gereklidir.',
            'description.required' => 'İçerik alanı gereklidir.',
            'category_id.required' => 'Kategori alanı gereklidir.',
            'category_id.exists' => 'Kategori bulunamadı.',
            'priority_id.required' => 'Öncelik alanı gereklidir.',
            'priority_id.exists' => 'Öncelik alanı bulunamadı.',
            'status_id.exists' => 'Durum alanı gereklidir.',
            'status_id.required' => 'Durum alanı bulunamadı.',

            'name.min' => 'Başlık alanı en az 5 karakterden oluşmalıdır.',
            'description.min' => 'İçerik alanı en az 5 karakterden oluşmalıdır.',

            'name.max' => 'Başlık alanı en fazla 30 karakterden oluşmalıdır.',
            'description.max' => 'İçerik alanı en fazla 200 karakterden oluşmalıdır.',
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
