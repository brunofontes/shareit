<?php

namespace App\Http\Controllers;

use \App\Item;
use \App\User;
use \App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::fromAuthUser()->get();
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
        $request->validate(['product' => 'required']);
        $product = User::loggedIn()
            ->products()->with('items')->find(request('product'));

        //Detach users from this item
        foreach ($product->items as $item) {
            Item::deleteAndDetach($item);
        }

        //Delete product
        $product->delete();
        return redirect('product');
    }

    public function patch(Request $request)
    {
        $request->validate(['product' => 'required', 'name' => 'required']);
        $product = User::loggedIn()->products()->find(request('product'));
        $product->name = request('name');
        $product->url = request('url');
        $product->save();
        return redirect('product/' . request('product'));
    }

    /**
     * Show a specified Product
     *
     * @param (int) $id The product id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::fromAuthUser()->find($id);

        if (!$product) {
            session()->flash('danger', "The product doesn't exist or doesn't belongs to you.");
            return back();
        }
        return view('product.show', compact('product'));
    }
}
