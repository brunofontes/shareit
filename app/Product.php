<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Ótima forma de adicionar um item por dentro do produto. Mas não estou usando por não saber como lidar com a table de UsuáriosPorItem
    /*
    public function addItem($name)
    {
        $this->items()->create(compact('name'));
    }
    */
}
