<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'register_username' => 'required',
            'email' => 'required',
            'register_password' => 'required|min:5',
            'password_confirm' => 'required|same:register_password',
        ];
    }

    public function messages()
    {
        return [
            'register_username.required' => 'username cannot be empty',
            'email.required' => 'email cannot be empty',
            'register_password.required' => "password cannot be empty",
            'register_password.min' => 'password not enough',
            'password_confirm.required' => 'repeatpassword cannot be empty',
            'password_confirm.same' => 'password do not match',
        ];
    }
}
