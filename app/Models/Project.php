<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
            'category_id',
            'image_id'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany(ProjectGallery::class, 'project_id', 'id');
    }
}
