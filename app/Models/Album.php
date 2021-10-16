<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable =
        [
            'name',
            'slug',
            'image_id',
            'parent_id',
            'text'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function parent()
    {
        return $this->belongsTo(Album::class, 'parent_id', 'id')->withDefault();
    }

    public function sub()
    {
        return $this->hasMany(Album::class, 'parent_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(AlbumAttribute::class, 'album_id', 'id');
    }
}
