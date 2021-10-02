<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class ProjectCategory extends Model
{
    protected $table = 'projects_categories';

    protected $fillable =
        [
            'name',
            'slug'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function path()
    {
        return route('projects.category', Hashids::encode($this->id) . '-' . $this->slug);
    }
}
