<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('admin_id', \Auth::id())->get();
        return view('product.index', compact('products'));
    }

    /**
     * Stores the included product into database
     * 
     * @return (view) The product view
     */
    public function store()
    {
        Product::create(['name' => request('product'), 'admin_id' => \Auth::id()]); //Just remember to add the fillable on Model to make this work
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
        $product = Product::where('admin_id', \Auth::id())->find($id);
        return view('product.show', compact('product'));
    }
}
