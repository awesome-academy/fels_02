<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'repassword' => 'required|same:password',
            'fullname' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('adminMess.val_username'),
            'password.required' => trans('adminMess.val_password'),
            'repassword.required' => trans('adminMess.val_repassword'),
            'fullname.required' => trans('adminMess.val_fullname'),
            'email.required' => trans('adminMess.val_email'),
            'email.email' => trans('adminMess.val_email2'),
            'birthday.required' => trans('adminMess.val_birthday'),
            'address.required' => trans('adminMess.val_address'),
            'phone.required' => trans('adminMess.val_phone'),
        ];
    }
}
