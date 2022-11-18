<?php

namespace App\Http\Requests\Admin\Album;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:albums,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:albums,slug'],
            'parent_id' => ['nullable', 'exists:albums,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120'],
            'text' => ['nullable', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام آلبوم',
            'slug' => 'اسلاگ آلبوم',
            'parent_id' => 'والد آلبوم',
            'image' => 'تصویر آلبوم',
            'text' => 'توضیحات آلبوم'
        ];
    }
}
