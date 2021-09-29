<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $id = request()->route('team');

        return [
            'name' => ['required', 'string', 'max:255', 'unique:team,name,' . $id],
            'job' => ['required', 'string', 'max:255'],
            'telegram' => ['nullable', 'url', 'unique:team,telegram,' . $id],
            'instagram' => ['nullable', 'url', 'unique:team,instagram,' . $id],
            'linkedin' => ['nullable', 'url', 'unique:team,linkedin,' . $id],
            'facebook' => ['nullable', 'url', 'unique:team,facebook,' . $id],
            'twitter' => ['nullable', 'url', 'unique:team,twitter,' . $id],
            'email' => ['nullable', 'email', 'unique:team,email,' . $id],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1024']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام عضو تیم',
            'job' => 'شغل(سمت) عضو تیم',
            'telegram' => 'تلگرام عضو تیم',
            'instagram' => 'اینستاگرام عضو تیم',
            'linkedin' => 'لینکدین عضو تیم',
            'facebook' => 'فیسبوک عضو تیم',
            'twitter' => 'تویتر عضو تیم',
            'email' => 'ایمیل عضو تیم',
            'image' => 'تصویر عضو تیم'
        ];
    }
}
