<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:team,name'],
            'job' => ['required', 'string', 'max:255'],
            'telegram' => ['nullable', 'url', 'unique:team,telegram'],
            'instagram' => ['nullable', 'url', 'unique:team,instagram'],
            'linkedin' => ['nullable', 'url', 'unique:team,linkedin'],
            'facebook' => ['nullable', 'url', 'unique:team,facebook'],
            'twitter' => ['nullable', 'url', 'unique:team,twitter'],
            'email' => ['nullable', 'email', 'unique:team,email'],
            'image' => ['required', 'mimes:jpg,png,jpeg', 'max:1024']
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
