<?php

namespace App\Http\Controllers;

use \App\Item;
use \App\User;
use Illuminate\Http\Request;
use App\Events\ReturnItem;

class TakeController extends Controller
{
    public function store(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        if ($item->used_by) {
            return back()->withErrors(
                \Lang::getFromJson(
                    "This item is already taken"
                )
            );
        }
        $item->used_by = \Auth::id();
        $item->save();
        return redirect('home');
    }

    public function delete(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        event(new ReturnItem($item));
        $item->returnItem();
        return redirect('home');
    }
}
