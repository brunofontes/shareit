<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \DB::table('items')
            ->join('item_user', 'item_user.item_id', '=', 'items.id')
            ->where('item_user.user_id', \Auth::id())
            ->select('items.*')
            ->get();
        return view('home', compact('items'));
    }
}
