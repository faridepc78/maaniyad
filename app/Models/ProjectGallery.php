<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    protected $table = 'projects_gallery';

    protected $fillable =
        [
            'project_id',
            'image_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }
}
