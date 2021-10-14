<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::query()->count()) {
            foreach (User::$users as $user) {
                User::query()->firstOrCreate([
                    'f_name' => $user['f_name'],
                    'l_name' => $user['l_name'],
                    'email' => $user['email'],
                    'mobile' => $user['mobile'],
                    'password' => bcrypt($user['password']),
                    'image_id' => null
                ]);
            }
        }
    }
}
