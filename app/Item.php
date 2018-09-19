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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function deleteAndDetach($item)
    {
        //Detach users from this item
        foreach ($item->users as $user) {
            User::findOrFail($user->id)->items()->detach($item->id);
        }

        //Delete item
        $item->delete();
    }

    /**
     * Return the items from logged in user
     * 
     * @return \App\Item
     */
    public static function fromAuthUser()
    {
        return (new static)->where('user_id', \Auth::id());
    }
}
