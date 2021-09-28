<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('service');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:services,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:services,slug,' . $id],
            'bio' => ['required', 'string', 'unique:services,bio,' . $id],
            'text' => ['required', 'string', 'unique:services,text,' . $id],
            'icon' => ['required', 'string', 'max:255', 'unique:services,icon,' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024']
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
