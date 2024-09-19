<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCatRequest extends FormRequest
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
               'title'=> 'required',
               'product_rating' => 'required',
               'category_id'    => 'required',
               'sub_category_id' => 'required',
               'deal_of_the_day' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Image is required',
            'image.max' => 'The Image is too large',
            'title.required' => 'Title is required',
            'product_rating.required' => 'Product rating is required',
            'category_id.required' => 'Category id is required',
            'sub_category_id.required' => 'SubCategory id is required',
            'deal_of_the_day.required' => 'Deal of the day is required'
        ];
    }
}
