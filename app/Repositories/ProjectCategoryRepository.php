<?php

namespace App\Repositories;

use App\Models\ProjectCategory;

class ProjectCategoryRepository
{
    public function store($values)
    {
        return ProjectCategory::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function paginate()
    {
        return ProjectCategory::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return ProjectCategory::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return ProjectCategory::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function getAll()
    {
        return ProjectCategory::query()
            ->latest()
            ->get();
    }
}
