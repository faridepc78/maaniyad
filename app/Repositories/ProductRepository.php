<?php

namespace App\Repositories;

use App\Filters\Product\Search;
use App\Models\Product;
use Illuminate\Pipeline\Pipeline;

class ProductRepository
{
    public function store($values)
    {
        return Product::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'code' => $values['code'],
                'album_id' => $values['album_id'],
                'image_id' => null,
                'text' => $values['text']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function paginateByFiltersByAlbumId($album_id)
    {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                \App\Filters\Product\Album\Search::class
            ])
            ->thenReturn()
            ->where('album_id', '=', $album_id)
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Product::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'code' => $values['code'],
                'album_id' => $values['album_id'],
                'image_id' => $image_id,
                'text' => $values['text']
            ]);
    }
}
