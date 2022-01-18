<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePass extends FormRequest
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
            'email'       =>  'required',
            'password'     => 'required',
            'newPass'    =>  'required|min:6|max:30',
            'rePass' =>  'required|min:6|max:30|same:newPass',
        ];
    }
    public function messages()
    {
        return [
        'password.required' => 'Mat khau cu khong duoc de trong',
        'newPass.required' => 'Mat khau cu khong duoc de trong',
        'rePass.required' => 'Mat khau cu khong duoc de trong',
        'rePass.same' => 'Mat khau xac nhan khong dung',

        ];
    }
}
