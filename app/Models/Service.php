<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable =
        [
            'name',
            'slug',
            'bio',
            'text',
            'icon',
            'image_id'
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

    public function path()
    {
        return route('service', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
