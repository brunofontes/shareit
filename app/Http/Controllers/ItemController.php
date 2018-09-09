<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Item;

class ItemController extends Controller
{
    //
    public function index()
    {
        //$item = Item::all();
        //return $item; //Show a JSON file instead of the view
        return view('item');
    }

    public function show($id)
    {
        $item = Item::find($id);
        return view('item', compact('item'));
    }
}
