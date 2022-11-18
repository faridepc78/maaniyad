<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('brand');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:brands,name,' . $id],
            'link' => ['nullable', 'url', 'unique:brands,link,' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
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
