<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Agency extends Model
{
    protected $table = 'agencies';

    protected $fillable =
        [
            'company_name',
            'name',
            'site',
            'province',
            'city',
            'experience',
            'area',
            'main_brands',
            'other_brands',
            'instagram',
            'telegram',
            'address',
            'phone',
            'mobile',
            'email',
            'type'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    const READ = 'read';
    const UNREAD = 'unread';
    static $types =
        [
            self::READ,
            self::UNREAD
        ];

    public function type()
    {
        if ($this->type == Agency::READ) {
            return '<td class="alert alert-success">' . Lang::get(self::READ) . '</td>';
        } elseif ($this->type == Agency::UNREAD) {
            return '<td class="alert alert-danger">' . Lang::get(self::UNREAD) . '</td>';
        }
    }
}
