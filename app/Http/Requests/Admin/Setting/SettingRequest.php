<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'projects_count' => ['required', 'numeric'],
            'customers_count' => ['required', 'numeric'],
            'team_count' => ['required', 'numeric'],
            'experience_count' => ['required', 'numeric'],
            'instagram' => ['nullable', 'max:255'],
            'telegram' => ['nullable', 'max:255'],
            'whatsapp' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'mobile' => ['nullable', 'string'],
            'about_page' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'projects_count' => 'تعداد پروژه ها',
            'customers_count' => 'تعداد مشتریان',
            'team_count' => 'تعداد اعضای تیم',
            'experience_count' => 'تعداد سال های تجربه',
            'instagram' => 'اینستاگرام',
            'telegram' => 'تلگرام',
            'whatsapp' => 'واتس اپ',
            'email' => 'ایمیل',
            'address' => 'آدرس',
            'phone' => 'تلفن ثابت',
            'mobile' => 'تلفن همراه',
            'about_page' => 'متن صفحه درباره ما'
        ];
    }
}
