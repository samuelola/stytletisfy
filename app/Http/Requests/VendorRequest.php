<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
              'business_email'=>'required|string|unique:vendors|max:255',
              'team_size'=>'required|integer',
              'business_name' => 'required|string',
              'business_description' => 'required|string',
              'corperate_type' => 'required|string',
              
                 
        ];
    }

     public function messages()
    {
        return [
            "business_email.required" => "Business Email is required",
            "team_size.required" => "Team Size",
            "business_name.required" => "Business Name is required",
            "business_description.required" => "Business Description is required",
            "corperate_type.required" => "Corperate Type is required",
            
        ];
    }
}
