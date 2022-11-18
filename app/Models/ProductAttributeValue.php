<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $table = 'products_attributes_values';

    protected $fillable =
        [
            'album_attribute_id',
            'product_id',
            'val'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function album_attribute()
    {
        return $this->belongsTo(AlbumAttribute::class, 'album_attribute_id', 'id')->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }
}
