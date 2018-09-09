<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function free($productID)
    {
        return $query->where([
            ['productID', $productID],
            ['usedBy', ''],
        ]);
    }

}
