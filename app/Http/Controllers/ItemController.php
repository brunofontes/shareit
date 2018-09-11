<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Item;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = \DB::table('items')
            ->join('products', 'items.product_id', '=', 'products.id')
            ->where([['products.admin_id', \Auth::id()], ['items.id', $id]])
            ->select('items.*', 'products.admin_id')
            ->get();
        $otherItems = Item::where([['product_id', $item[0]->product_id], ['id', '!=', $id]])->get();
        return view('item', compact('item', 'otherItems'));
    }

    public function index()
    {
        //TODO: Fazer innerjoint com tabela de users por item
        $items = Item::where('admin_id', \Auth::id())->get();
        return view('item.index', compact('items'));
    }

    /**
     * Stores the included item into database
     * As the items are included on the Product view,
     * it must return to there after inclusion
     * 
     * @return (view) The product view
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'item' => 'required',
                'product_id' => 'required'
            ]
        );
        $id = Item::insertGetId(['name' => request('item'), 'product_id' => request('product_id')]); //Just remember to add the fillable on Model to make this work
        \DB::table('item_user')->insert([ 'user_id' => \Auth::id(), 'item_id' => $id]);

        return redirect('product/'.request('product_id'));
    }

}
