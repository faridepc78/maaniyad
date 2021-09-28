<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    public function store($values)
    {
        return Service::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'bio' => $values['bio'],
                'text' => $values['text'],
                'icon' => $values['icon'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Service::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginate()
    {
        return Service::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Service::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Service::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'bio' => $values['bio'],
                'text' => $values['text'],
                'icon' => $values['icon'],
                'image_id' => $image_id
            ]);
    }
}
