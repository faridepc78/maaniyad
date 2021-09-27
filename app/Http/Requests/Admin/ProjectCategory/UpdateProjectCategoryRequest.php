<?php

namespace App\Http\Requests\Admin\ProjectCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectCategoryRequest extends FormRequest
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
        $id = request()->route('projects_category');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:projects_categories,name,' . $id],
            'slug' => ['required', 'string', 'max:255', 'unique:projects_categories,slug,' . $id]
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
