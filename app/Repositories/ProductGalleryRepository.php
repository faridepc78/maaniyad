<?php

namespace App\Repositories;

use App\Models\ProductGallery;

class ProductGalleryRepository
{
    public function findGalleryByProductId($product_id)
    {
        return ProductGallery::query()
            ->where('product_id', '=', $product_id)
            ->latest()
            ->paginate(10);
    }

    public function store($values)
    {
        return ProductGallery::query()
            ->create([
                'product_id' => $values['product_id'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return ProductGallery::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function findById($id)
    {
        return ProductGallery::query()
            ->findOrFail($id);
    }
}
