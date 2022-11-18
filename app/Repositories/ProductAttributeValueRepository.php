<?php

namespace App\Repositories;

use App\Models\ProductAttributeValue;

class ProductAttributeValueRepository
{
    protected function check($album_attribute_id, $product_id)
    {
        return ProductAttributeValue::query()
            ->where('album_attribute_id', '=', $album_attribute_id)
            ->where('product_id', '=', $product_id)
            ->first();
    }

    public function createOrUpdate($album_attribute_id, $product_id, $val)
    {
        $data = $this->check($album_attribute_id, $product_id);

        if ($data) {
            return ProductAttributeValue::query()
                ->where('id', '=', $data['id'])
                ->update([
                    'val' => $val
                ]);
        } else {
            return ProductAttributeValue::query()
                ->create([
                    'album_attribute_id' => $album_attribute_id,
                    'product_id' => $product_id,
                    'val' => $val
                ]);
        }
    }
}
