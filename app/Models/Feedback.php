<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable =
        [
            'name',
            'job',
            'text',
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

    public function getProfileAttribute()
    {
        return empty($this->image->files)
            ? asset('assets/common/images/profile.png')
            : "/uploads/" . $this->image->files['original'];
    }
}
