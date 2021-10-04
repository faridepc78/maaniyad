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
                'index_about' => $values['index_about'],
                'index_item1' => $values['index_item1'],
                'index_item2' => $values['index_item2'],
                'index_item3' => $values['index_item3'],
                'instagram' => $values['instagram'],
                'telegram' => $values['telegram'],
                'facebook' => $values['facebook'],
                'twitter' => $values['twitter'],
                'linkedin' => $values['linkedin'],
                'email' => $values['email'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'mobile' => $values['mobile'],
                'about_page' => $values['about_page'],
                'services_page' => $values['services_page']
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
                'index_about' => $values['index_about'],
                'index_item1' => $values['index_item1'],
                'index_item2' => $values['index_item2'],
                'index_item3' => $values['index_item3'],
                'instagram' => $values['instagram'],
                'telegram' => $values['telegram'],
                'facebook' => $values['facebook'],
                'twitter' => $values['twitter'],
                'linkedin' => $values['linkedin'],
                'email' => $values['email'],
                'address' => $values['address'],
                'phone' => $values['phone'],
                'mobile' => $values['mobile'],
                'about_page' => $values['about_page'],
                'services_page' => $values['services_page']
            ]);
    }
}
