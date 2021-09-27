<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
