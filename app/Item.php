<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function free($productID, $userID)
    {
        return $query->where([
            ['userID', $userID],
            ['productID', $productID],
            ['usedBy', ''],
        ]);
    }

}
