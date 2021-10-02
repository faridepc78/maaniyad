<?php

namespace App\Repositories;

use App\Filters\Project\Date;
use App\Filters\Project\Search;
use App\Models\Project;
use Illuminate\Pipeline\Pipeline;

class ProjectRepository
{
    public function store($values)
    {
        return Project::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'customer' => $values['customer'],
                'text' => $values['text'],
                'link' => $values['link'],
                'category_id' => $values['category_id'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return Project::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(Project::query())
            ->through([
                Search::class,
                Date::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return Project::query()
            ->findOrFail($id);
    }

    public function update($values, $image_id, $id)
    {
        return Project::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug'],
                'customer' => $values['customer'],
                'text' => $values['text'],
                'link' => $values['link'],
                'category_id' => $values['category_id'],
                'image_id' => $image_id
            ]);
    }

    public function get($count)
    {
        return Project::query()
            ->limit($count)
            ->latest()
            ->get();
    }

    public function site_paginate()
    {
        return Project::query()
            ->latest()
            ->paginate(12);
    }

    public function findByCategoryId($category_id)
    {
        return Project::query()
            ->where('category_id', '=', $category_id)
            ->latest()
            ->paginate(12);
    }

    public function search($keyword)
    {
        return Project::query()
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate(12);
    }
}
