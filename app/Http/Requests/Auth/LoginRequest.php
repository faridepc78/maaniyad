<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_name' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'نام کاربری',
            'password' => 'رمز عبور'
        ];
    }
}
