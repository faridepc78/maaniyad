<?php

namespace App\Http\Requests\Site\ContactUs;

use App\Models\ContactUs;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'type' => ContactUs::UNREAD
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'phone' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'subject' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'email' => 'ایمیل',
            'phone' => 'تلفن همراه',
            'subject' => 'موضوع',
            'text' => 'پیام'
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'فیلد ریکپچا الزامی است.',
            'g-recaptcha-response.captcha' => 'لطفا فیلد ریکپچا را مجداد پر کنید.'
        ];
    }
}
