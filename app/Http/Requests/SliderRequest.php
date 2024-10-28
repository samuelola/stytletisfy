<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'slider_cat_name'=>'required|string',
            'slider_type'=>'required|string',
            'slider_image' => 'required|image|mimes:jpg,jpeg,png,svg,jfif|max:2048',
            'slider_background_image' => 'required|image|mimes:jpg,jpeg,png,svg,jfif|max:2048',
            
        ];
    }
}
