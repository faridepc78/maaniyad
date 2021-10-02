<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFaqRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('faq');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:faqs,name,' . $id],
            'value' => ['required', 'string', 'unique:faqs,value,' . $id]
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
