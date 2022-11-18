<?php

namespace App\Http\Requests\Admin\AlbumAttribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAlbumAttributeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() == true;
    }

    public function rules()
    {
        $name = request('name');
        $album_id = request('album_id');
        $id = request()->route('id');

        return [
            'name' => ['required', 'string', 'max:255',
                Rule::unique('albums_attributes')->where(function ($query) use ($name, $album_id, $id) {
                    return $query->where('name', '=', $name)
                        ->where('album_id', '=', $album_id)
                        ->whereNotIn('id', [$id]);
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
