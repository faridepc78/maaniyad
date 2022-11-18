<?php

namespace App\Http\Requests\Admin\AlbumAttribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlbumAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $name = request('name');
        $album_id = request('album_id');

        return [
            'name' => ['required', 'string', 'max:255',
                Rule::unique('albums_attributes')->where(function ($query) use ($name, $album_id) {
                    return $query->where('name', '=', $name)
                        ->where('album_id', '=', $album_id);
                })]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام ویژگی آلبوم'
        ];
    }
}
