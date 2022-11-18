<?php

namespace App\Repositories;

use App\Models\AlbumAttribute;

class AlbumAttributeRepository
{
    public function store($values)
    {
        return AlbumAttribute::query()
            ->create([
                'album_id' => $values['album_id'],
                'name' => $values['name']
            ]);
    }

    public function paginate($album_id)
    {
        return AlbumAttribute::query()
            ->where('album_id', '=', $album_id)
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return AlbumAttribute::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return AlbumAttribute::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name']
            ]);
    }
}
