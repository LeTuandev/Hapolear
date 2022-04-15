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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'username cannot be empty',
            'email.required' => 'email cannot be empty',
            'password.required' => "password cannot be empty",
            'password.min' => 'password not enough',
            'password_confirm.required' => 'repeatpassword cannot be empty',
            'password_confirm.same' => 'password do not match',
        ];
    }
}
