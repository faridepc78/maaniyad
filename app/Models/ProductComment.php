<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class ProductComment extends Model
{
    protected $table = 'products_comments';

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $fillable =
        [
            'product_id',
            'name',
            'email',
            'mobile',
            'site',
            'message',
            'answer',
            'admin_name',
            'admin_profile',
            'status'
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

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash?d=mm";
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }

    public function status()
    {
        if ($this->status == ProductComment::ACTIVE) {
            return '<td class="alert alert-success">' . Lang::get(self::ACTIVE) . '</td>';
        } elseif ($this->status == ProductComment::PENDING) {
            return '<td class="alert alert-warning">' . Lang::get(self::PENDING) . '</td>';
        } elseif ($this->status == ProductComment::INACTIVE) {
            return '<td class="alert alert-danger">' . Lang::get(self::INACTIVE) . '</td>';
        }
    }
}
