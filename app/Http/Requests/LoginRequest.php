<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'log_username' => 'required',
            'log_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'log_username.required' => trans('auth.username_required'),
            'log_password.required' => trans('auth.password_required'),
        ];
    }
}
