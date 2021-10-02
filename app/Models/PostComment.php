<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class PostComment extends Model
{
    protected $table = 'posts_comments';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'post_id',
            'name',
            'email',
            'mobile',
            'site',
            'message',
            'answer'
        ];

    const PENDING = 'pending';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    static $statuses =
        [
            self::PENDING,
            self::ACTIVE,
            self::INACTIVE
        ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id')->withDefault();
    }

    public function status()
    {
        if ($this->status == PostComment::ACTIVE) {
            return '<td class="alert alert-success">' . Lang::get(self::ACTIVE) . '</td>';
        } elseif ($this->status == PostComment::PENDING) {
            return '<td class="alert alert-warning">' . Lang::get(self::PENDING) . '</td>';
        } elseif ($this->status == PostComment::INACTIVE) {
            return '<td class="alert alert-danger">' . Lang::get(self::INACTIVE) . '</td>';
        }
    }
}
