<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $fillable =
        [
            'name',
            'value'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];
}
