<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', \Auth::id())->get();
        return view('product.index', compact('products'));
    }

    /**
     * Stores the included product into database
     * 
     * @return (view) The product view
     */
    public function store(Request $request)
    {
        $request->validate(['product' => 'required']);
        Product::create(['name' => request('product'), 'user_id' => \Auth::id(), 'url' => request('url') ?? '']); //Just remember to add the fillable on Model to make this work
        return redirect('product');
    }

    /**
     * Delete a specified Product
     * 
     * @param (int) $id The product id
     */
    public function delete(Request $request)
    {
        //TODO: Delete all items with all users for the product
        $request->validate(['product' => 'required']);
        $item = User::find(\Auth::id())
            ->items()->with('users')->find(request('item'));
        $product = $item->product_id;

        //Detach users from this item
        foreach ($item->users as $user) {
            User::findOrFail($user->id)->items()->detach($item->id);
        }

        //Delete item
        $item->delete();
        return redirect('product/' . $product);
    }

    public function patch(Request $request)
    {
        $request->validate(['item' => 'required', 'name' => 'required']);
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->name = request('name');
        $item->save();
        return redirect('item/'.request('item'));
    }

    /**
     * Show a specified Product
     * 
     * @param (int) $id The product id
     */
    public function show($id)
    {
        $product = Product::where('user_id', \Auth::id())->find($id);
        return view('product.show', compact('product'));
    }
}
