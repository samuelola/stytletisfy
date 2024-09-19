<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
               'image' => 'required|image|mimes:jpg,jpeg,png,svg,jfif|max:2048', 
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Image is required',
            'image.max' => 'The Image is too large',
        ];
    }
}
