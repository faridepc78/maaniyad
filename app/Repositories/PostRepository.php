<?php

namespace App\Repositories;

use App\Filters\Post\Search;
use App\Filters\Post\Status;
use App\Models\Post;
use Illuminate\Pipeline\Pipeline;

class PostRepository
{
    public function store($values)
    {
        return Post::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'category_id' => $values['category_id'],
                'image_id' => null,
                'text' => $values['text'],
                'status' => $values['status']
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Post::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Search::class,
                Status::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Post::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Post::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'category_id' => $values['category_id'],
                'image_id' => $image_id,
                'text' => $values['text'],
                'status' => $values['status']
            ]);
    }
}
