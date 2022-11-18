<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $id = request()->route('product');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug,' . $id],
            'code' => ['required', 'string', 'max:255', 'unique:products,code,' . $id],
            'album_id' => ['required', 'exists:albums,id'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120'],
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
