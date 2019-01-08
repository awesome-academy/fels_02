<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'fullname' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('auth.username_required'),
            'fullname.required' => trans('auth.fullname_required'),
            'birthday.required' => trans('auth.birth_required'),
            'email.required' => trans('auth.email_required'),
            'phone.required' => trans('auth.phone_required'),
            'address.required' => trans('auth.address_required'),
        ];
    }
}
