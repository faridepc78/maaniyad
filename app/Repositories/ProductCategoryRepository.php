<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository
{
    public function store($values)
    {
        return ProductCategory::query()
            ->create([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function paginate()
    {
        return ProductCategory::query()
            ->latest()
            ->paginate(10);
    }

    public function findById($id)
    {
        return ProductCategory::query()
            ->findOrFail($id);
    }

    public function update($values, $id)
    {
        return ProductCategory::query()
            ->where('id', '=', $id)
            ->update([
                'name' => $values['name'],
                'slug' => $values['slug']
            ]);
    }

    public function getAll()
    {
        return ProductCategory::query()
            ->latest()
            ->get();
    }
}
