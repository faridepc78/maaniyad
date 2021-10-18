<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'code' => ['required', 'string', 'max:255', 'unique:products,code'],
            'album_id' => ['required', 'exists:albums,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام محصول',
            'slug' => 'اسلاگ محصول',
            'album_id' => 'آلبوم محصول',
            'image' => 'تصویر محصول',
            'text' => 'توضیحات محصول'
        ];
    }
}
