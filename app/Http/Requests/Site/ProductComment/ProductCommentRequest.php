<?php

namespace App\Http\Requests\Site\ProductComment;

use App\Models\ProductComment;
use App\Rules\ValidationMobile;
use Illuminate\Foundation\Http\FormRequest;

class ProductCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'product_id' => extractId(request()->route('product_id')),
            'status' => ProductComment::PENDING
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'mobile' => ['required', 'numeric', 'digits:11', new ValidationMobile()],
            'site' => ['nullable', 'string', 'max:255', 'url'],
            'message' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'email' => 'ایمیل',
            'mobile' => 'تلفن همراه',
            'site' => 'سایت',
            'message' => 'نظر'
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
