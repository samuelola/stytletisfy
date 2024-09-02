<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
               'title'=>'required',
               'description' => 'required',
               'image' => 'required|image|mimes:jpg,jpeg,png,svg,jfif|max:2048',
               'price' => 'required|numeric',
               'user_id' => 'required',
               'stock_qty'  => 'required|numeric',
               'stock_status'  => 'required',
               'category_id' => 'required|numeric',
               'sub_category_id' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'image.max' => 'The Image is too large',
        ];
    }
}
