<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function store($values)
    {
        return Setting::query()
            ->create([
                'projects_count' => $values['projects_count'],
                'customers_count' => $values['customers_count'],
                'team_count' => $values['team_count'],
                'experience_count' => $values['experience_count'],
                'instagram' => $values['instagram'],
                'telegram' => $values['telegram'],
                'whatsapp' => $values['whatsapp'],
                'email' => $values['email'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'mobile' => $values['mobile'],
                'about_page' => $values['about_page']
            ]);
    }

    public function show()
    {
        $data = Setting::query()
            ->get();
        if (count($data)) {
            return $data->first();
        } else {
            return $data->put('status', 'store');
        }
    }

    public function update($values, $id)
    {
        return Setting::query()
            ->where('id', '=', $id)
            ->update([
                'projects_count' => $values['projects_count'],
                'customers_count' => $values['customers_count'],
                'team_count' => $values['team_count'],
                'experience_count' => $values['experience_count'],
                'instagram' => $values['instagram'],
                'telegram' => $values['telegram'],
                'whatsapp' => $values['whatsapp'],
                'email' => $values['email'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'mobile' => $values['mobile'],
                'about_page' => $values['about_page']
            ]);
    }
}
