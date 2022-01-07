<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'email'  => 'required',
            'password'      => 'required',
            'password_confirm' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'email.required'  => 'phai dien old ',
            'password.required'      => 'phai dien password',
            'password_confirm.required' => 'phai dien comfirm',
            'password_confirm.same' => 'mat khau xac nhan khong dung',

        ];
    }
}
