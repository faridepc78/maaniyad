<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =
        [
            'projects_count',
            'customers_count',
            'team_count',
            'experience_count',
            'index_about',
            'index_item1',
            'index_item2',
            'index_item3',
            'instagram',
            'telegram',
            'facebook',
            'twitter',
            'linkedin',
            'email',
            'address',
            'phone',
            'mobile',
            'about_page',
            'services_page'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];
}
