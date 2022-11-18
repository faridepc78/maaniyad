<?php

namespace App\Http\Requests\Admin\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('feedback');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:feedbacks,name,' . $id],
            'job' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5120']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام مشتری',
            'job' => 'شغل مشتری',
            'text' => 'نظر مشتری',
            'image' => 'تصویر مشتری'
        ];
    }
}
