<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable =
        [
            'name',
            'slug',
            'customer',
            'text',
            'link',
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
        return $this->belongsTo(Media::class, 'image_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(ProjectGallery::class, 'project_id', 'id');
    }

    public function path()
    {
        return route('project', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
