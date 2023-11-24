<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'user_name' => 'required|max:50',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'max:1000',
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}
