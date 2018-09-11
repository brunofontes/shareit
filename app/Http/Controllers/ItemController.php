<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Item;

class ItemController extends Controller
{
    public function show($id)
    {
        //TODO: Fazer innerjoint com tabela de users por item
        $item = Item::where([['id', $id], ['userID', \Auth::id()]]);
        return view('item', compact('item'));
    }

    public function index()
    {
        //TODO: Fazer innerjoint com tabela de users por item
        $items = Item::where('adminID', \Auth::id())->get();
        return view('item.index', compact('items'));
    }

    /**
     * Stores the included item into database
     * As the items are included on the Product view,
     * it must return to there after inclusion
     * 
     * @return (view) The product view
     */
    public function store()
    {
        $this->validate(request(), ['name' => 'required']);
        Item::create(['name' => request('item'), 'productID' => request('productID')]); //Just remember to add the fillable on Model to make this work

        return redirect('product');
    }

}
