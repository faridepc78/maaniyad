<?php

namespace App\Repositories;

use App\Models\Team;

class TeamRepository
{
    public function store($values)
    {
        return Team::query()
            ->create([
                'name' => $values['name'],
                'job' => $values['job'],
                'telegram' => $values['telegram'],
                'instagram' => $values['instagram'],
                'linkedin' => $values['linkedin'],
                'facebook' => $values['facebook'],
                'twitter' => $values['twitter'],
                'email' => $values['email'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Team::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Team::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Team::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Team::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'job' => $values['job'],
                'telegram' => $values['telegram'],
                'instagram' => $values['instagram'],
                'linkedin' => $values['linkedin'],
                'facebook' => $values['facebook'],
                'twitter' => $values['twitter'],
                'email' => $values['email'],
                'image_id' => $image_id
            ]);
    }
}
