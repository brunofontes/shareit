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
        $item->usedBy = \Auth::id();
        $item->save();
        return redirect('home');
    }
}
