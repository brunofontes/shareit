<?php

namespace App;

use Auth;
use Lang;
use Illuminate\Database\Eloquent\Model;
use Exception;

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
        return (new static)->where('user_id', Auth::id());
    }

    /**
     * Take a specified item
     * 
     * @return void
     */
    public function takeItem()
    {
        if (isset($this->used_by)) {
            throw new Exception("Trying to take an Item that is in use", 1);
        }

        $this->used_by = Auth::id();
        $this->waiting_user_id = null;
        $this->save();
    }

    /**
     * Return a specified item
     * 
     * @return void
     */
    public function returnItem()
    {
        if ($this->used_by != Auth::id()) {
            throw new Exception("Trying to return an empty Item or from other user", 1);
        }

        $this->used_by = null;
        $this->save();
    }

    /**
     * Store a waiting user to the item
     * 
     * @return void
     */
    public function storeAlert()
    {
        $this->waiting_user_id = Auth::id();
        $this->timestamps = false;
        $this->save();
    }

    /**
     * Remove a waiting user to the item
     * 
     * @return void
     */
    public function removeAlert()
    {
        $this->waiting_user_id = null;
        $this->timestamps = false;
        $this->save();
    }
}
