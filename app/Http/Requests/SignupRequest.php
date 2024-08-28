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
              'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
              'password_confirmation' => 'min:6',
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must not be less than 3 characters.',
            "email.required" => "Email is required",
            "email.unique" => "Email is already taken",
            "password.min" => "Password must not be less than 6 characters.",
            "password_confirmed.required" => "Confirm your password"
        ];
    }
}
