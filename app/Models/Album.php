<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

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

    public function path()
    {
        return route('album', Hashids::encode($this->id) . '-' . $this->slug);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'album_id', 'id');
    }

    public function count_products()
    {
        return $this->products()->count();
    }
}
