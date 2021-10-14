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
            'slug' => str_slug_persian(request('slug')),
            'code' => 'mp-' . randomNumbers(10)
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'category_id' => ['required', 'exists:products_categories,id'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:1024'],
            'text' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام محصول',
            'slug' => 'اسلاگ محصول',
            'category_id' => 'دسته بندی محصول',
            'image' => 'تصویر محصول',
            'text' => 'توضیحات محصول'
        ];
    }
}
