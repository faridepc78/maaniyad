<?php

namespace App\Http\Requests\Admin\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostCategoryRequest extends FormRequest
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
        $id = request()->route('postsCategory');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:posts_categories,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:posts_categories,slug,' . $id]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام دسته بندی',
            'slug' => 'اسلاگ دسته بندی'
        ];
    }
}
