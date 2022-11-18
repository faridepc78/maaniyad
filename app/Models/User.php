<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable =
        [
            'f_name',
            'l_name',
            'email',
            'mobile',
            'password',
            'image_id',
            'remember_token'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    protected $hidden =
        [
            'remember_token',
            'password'
        ];

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id', 'id')->withDefault();
    }

    public function getFullNameAttribute()
    {
        return $this->f_name . ' ' . $this->l_name;
    }

    public function getProfileAttribute()
    {
        return empty($this->image->files)
            ? asset('assets/common/images/profile.png')
            : "/uploads/" . $this->image->files['original'];
    }

    static $users = [
        'admin' => [
            'f_name' => 'فرید',
            'l_name' => 'شیشه بری',
            'email' => 'faridnewepc78@gmail.com',
            'mobile' => '09162154221',
            'password' => '09162154221'
        ]
    ];
}
