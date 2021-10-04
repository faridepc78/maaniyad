<?php

namespace App\Http\Requests\Admin\Setting;

use App\Rules\ValidationMobile;
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
            'index_about' => ['required', 'string'],
            'index_item1' => ['required', 'string'],
            'index_item2' => ['required', 'string'],
            'index_item3' => ['required', 'string'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'telegram' => ['nullable', 'url', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'numeric'],
            'mobile' => ['nullable', 'numeric', 'digits:11', new ValidationMobile()],
            'about_page' => ['nullable', 'string'],
            'services_page' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'projects_count' => 'تعداد پروژه ها',
            'customers_count' => 'تعداد مشتریان',
            'team_count' => 'تعداد اعضای تیم',
            'experience_count' => 'تعداد سال های تجربه',
            'index_about' => 'متن درباره ما صفحه اصلی',
            'index_item1' => 'آیتم اول صفحه اصلی',
            'index_item2' => 'آیتم دوم صفحه اصلی',
            'index_item3' => 'آیتم سوم صفحه اصلی',
            'instagram' => 'لینک اینستاگرام',
            'telegram' => 'لینک تلگرام',
            'facebook' => 'لینک فیسبوک',
            'twitter' => 'لینک تویتر',
            'linkedin' => 'لینک لینکدین',
            'email' => 'ایمیل',
            'address' => 'آدرس',
            'phone' => 'تلفن ثابت',
            'mobile' => 'تلفن همراه',
            'about_page' => 'متن صفحه درباره ما',
            'services_page' => 'متن صفحه خدمات ما',
        ];
    }
}
