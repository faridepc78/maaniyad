<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'name',
            'slug',
            'code',
            'album_id',
            'image_id',
            'text'
        ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
