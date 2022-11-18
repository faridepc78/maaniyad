<?php

namespace App\Http\Requests\Admin\PostComment;

use App\Models\PostComment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ManagementPostCommentRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'admin_name' => Auth::user()->fullName,
            'admin_profile' => Auth::user()->profile
        ]);
    }

    public function rules()
    {
        return [
            'status' => ['required', Rule::in(PostComment::$statuses)],
            'answer' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'status' => 'وضعیت نظر',
            'answer' => 'پاسخ نظر'
        ];
    }
}
