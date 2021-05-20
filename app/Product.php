<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'name', 'url'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the products from logged in user
     *
     * @return \App\Product
     */
    public static function fromAuthUser()
    {
        return (new static)->where('user_id', \Auth::id());
    }
}
