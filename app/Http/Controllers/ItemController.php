<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Item;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        if (!$item || $item->product->user_id != \Auth::id()) return back();

        $otherItems = Item::where([['product_id', $item->product_id], ['id', '!=', $id]])->get();
        return view('item', compact('item', 'otherItems'));
    }

    public function index()
    {
        //TODO: Fazer innerjoint com tabela de users por item
        $items = Item::where('user_id', \Auth::id())->get();
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
