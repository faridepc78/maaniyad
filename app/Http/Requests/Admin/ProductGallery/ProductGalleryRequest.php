<?php

namespace App\Http\Requests\Admin\ProductGallery;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'product_id' => request()->route('product_id')
        ]);
    }

    public function rules()
    {
        return [
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'تصویر گالری محصول'
        ];
    }
}
