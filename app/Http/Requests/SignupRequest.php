<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
        //good code
        return [
             
              'name'=>'required|string',
              'email'=>'required|string|unique:users|max:255',
              'password'=>'required|min:6|confirmed',
              'password_confirmation' => 'required|min:6',
              'role_id'  => 'required'
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must not be less than 3 characters.',
            "email.required" => "Email is required",
            "role_id.required" => "Role Id is required",
            "email.unique" => "Email is already taken",
            "password.required" => "Password is required",
            "password.min" => "Password must not be less than 6 characters.",
            "password_confirmed.required" => "Confirm your password"
        ];
    }
}
