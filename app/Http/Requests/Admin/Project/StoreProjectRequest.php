<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:projects,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:projects,slug'],
            'customer' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'link' => ['nullable', 'url'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام پروژه',
            'slug' => 'اسلاگ پروژه',
            'customer' => 'مشتری پروژه',
            'text' => 'توضیحات پروژه',
            'link' => 'لینک پروژه',
            'image' => 'تصویر پروژه'
        ];
    }
}
