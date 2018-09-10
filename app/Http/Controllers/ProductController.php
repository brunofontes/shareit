<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\User;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::where('adminID', \Auth::id())->get();
        return view('product.index', compact('products'));
    }

    /**
     * Stores the included product into database
     * 
     * @return (view) The product view
     */
    public function store()
    {
        /*
        $product = new Product;
        $product->name = request('product');
        $product->adminID = $userID;
        $product->save();
        */
        Product::create(['name' => request('product'), 'adminID' => \Auth::id()]); //Just remember to add the fillable on Model to make this work

        return redirect('product');
    }

    /**
     * Delete a specified Product
     * 
     * @param (int) $id The product id
     */
    public function delete($id)
    {
    }

    /**
     * Show a specified Product
     * 
     * @param (int) $id The product id
     */
    public function show($id)
    {
        $product = Product::find($id);
        $items = \DB::table('items')
            ->join('products', 'items.productID', '=', 'products.id')
            ->where('products.adminID', \Auth::id())
            ->select('items.*', 'products.*')
            ->get();
        return view('product.show', compact('items', 'product'));
    }
}
