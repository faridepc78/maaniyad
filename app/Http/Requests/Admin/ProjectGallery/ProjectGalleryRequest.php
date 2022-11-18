<?php

namespace App\Http\Requests\Admin\ProjectGallery;

use Illuminate\Foundation\Http\FormRequest;

class ProjectGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'project_id' => request()->route('project_id')
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
            'image' => 'تصویر گالری پروژه'
        ];
    }
}
