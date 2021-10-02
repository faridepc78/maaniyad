<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:faqs,name'],
            'value' => ['required', 'string', 'unique:faqs,value']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'عنوان سوال',
            'value' => 'توضیحات سوال'
        ];
    }
}
