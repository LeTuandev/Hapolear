<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'date' => 'required',
            'address' => 'required',
            'email_update' => 'required',
            'phone' => 'required',
            'about' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name field can not be empty!',
            'date.required' => 'date field can not be empty',
            'address.required' => 'address field can not be empty',
            'email_update.required' => 'email field can not be empty',
            'phone.required' => 'phone field can not be empty',
            'about.required' => 'about field can not be empty',
        ];
    }
}
