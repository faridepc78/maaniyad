<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumAttribute extends Model
{
    protected $table = 'albums_attributes';

    protected $fillable =
        [
            'album_id',
            'name'
        ];

    protected $guarded =
        [
            'id',
            'created_at',
            'updated_at'
        ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id')->withDefault();
    }

    public function getValueAttribute($product_id,$album_attribute_id)
    {
        return ProductAttributeValue::query()
            ->where('product_id','=',$product_id)
            ->where('album_attribute_id','=',$album_attribute_id)
            ->select('val')
            ->first();
    }
}
