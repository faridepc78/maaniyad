<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:sliders,name'],
            'text' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'unique:sliders,url'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:2048']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام اسلایدر',
            'text' => 'توضیحات اسلایدر',
            'url' => 'لینک اسلایدر',
            'image' => 'تصویر اسلایدر'
        ];
    }
}
