<?php

namespace App\Http\Requests\Site\Agency;

use App\Models\Agency;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'type' => Agency::UNREAD
        ]);
    }

    public function rules()
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'site' => ['nullable', 'string', 'max:255', 'url'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'numeric'],
            'area' => ['nullable', 'string', 'max:255'],
            'main_brands' => ['nullable', 'string', 'max:255'],
            'other_brands' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'telegram' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'email' => ['nullable', 'string', 'max:255', 'email'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }

    public function attributes()
    {
        return [
            'company_name' => 'نام فروشگاه یا شرکت',
            'name' => 'نام مالک یا مدیر',
            'site' => 'سایت فروشگاه',
            'province' => 'استان',
            'city' => 'شهر',
            'experience' => 'سابقه فعالیت به سال',
            'area' => 'متراژ فروشگاه یا نمایشگاه فروش',
            'main_brands' => 'برندهای حوزه کاغذ دیواری',
            'other_brands' => 'برندهای سایر حوزه های تزیینات داخلی',
            'instagram' => 'صفحه اینستاگرام',
            'telegram' => 'کانال تلگرام',
            'address' => 'آدرس فروشگاه یا شرکت',
            'phone' => 'تلفن ثابت',
            'mobile' => 'تلفن همراه',
            'email' => 'ایمیل'
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
