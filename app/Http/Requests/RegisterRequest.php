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
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'fullname' => 'required',
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => trans('auth.username_required'),
            'password.required' => trans('auth.username_required'),
            'password_confirmation.same' => trans('auth.pwconfirm_confirm'),
            'password_confirmation.required' => trans('auth.pwconfirm_required'),
            'fullname.required' => trans('auth.fullname_required'),
            'email.required' => trans('auth.email_required'),
        ];
    }
}
