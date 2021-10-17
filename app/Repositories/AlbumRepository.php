<?php

namespace App\Repositories;

use App\Models\Album;

class AlbumRepository
{
    public function store($values)
    {
        return Album::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'image_id' => null,
                'parent_id' => $values['parent_id'],
                'text' => $values['text']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Album::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function getParents()
    {
        return Album::query()
            ->where('parent_id', '=', null)
            ->latest()
            ->get();
    }

    public function paginate()
    {
        return Album::query()
            ->where('parent_id', '=', null)
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Album::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Album::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'image_id' => $image_id,
                'parent_id' => $values['parent_id'],
                'text' => $values['text']
            ]);
    }

    public function getAll()
    {
        return Album::query()
            ->latest()
            ->get();
    }

    public function getSubs($id)
    {
        return Album::query()
            ->where('parent_id', '=', $id)
            ->latest()
            ->paginate(10);
    }

    public function getAllSubs()
    {
        return Album::query()
            ->where('parent_id', '!=', '')
            ->whereNotNull('parent_id')
            ->latest()
            ->paginate(30);
    }
}
