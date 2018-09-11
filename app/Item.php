<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['product_id', 'name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function free($product_id, $user_id)
    {
        return $query->where([
            ['user_id', $user_id],
            ['product_id', $product_id],
            ['usedBy', ''],
        ]);
    }

}
