<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'slug' => str_slug_persian(request('slug'))
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:services,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:services,slug'],
            'bio' => ['required', 'string', 'unique:services,bio'],
            'text' => ['required', 'string', 'unique:services,text'],
            'icon' => ['required', 'string', 'max:255', 'unique:services,icon'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:1024']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام خدمت',
            'slug' => 'اسلاگ خدمت',
            'bio' => 'بیو خدمت',
            'text' => 'توضیحات خدمت',
            'icon' => 'آیکون خدمت',
            'image' => 'تصویر خدمت'
        ];
    }
}
