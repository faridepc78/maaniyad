<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:brands,name'],
            'link' => ['nullable', 'url', 'unique:brands,link'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام برند',
            'link' => 'لینک برند',
            'image' => 'تصویر برند'
        ];
    }
}
