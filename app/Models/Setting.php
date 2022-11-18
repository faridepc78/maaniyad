<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'projects_count',
            'customers_count',
            'team_count',
            'experience_count',
            'instagram',
            'telegram',
            'whatsapp',
            'email',
            'address',
            'phone',
            'mobile',
            'about_page'
        ];
}
