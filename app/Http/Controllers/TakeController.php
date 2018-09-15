<?php

namespace App\Http\Controllers;

use \App\Item;
use \App\User;
use Illuminate\Http\Request;

class TakeController extends Controller
{
    public function store(Request $request)
    {
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->used_by = \Auth::id();
        $item->save();
        return redirect('home');
    }

    public function delete(Request $request)
    {
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->used_by = null;
        $item->save();

        return redirect('home');
    }
}
