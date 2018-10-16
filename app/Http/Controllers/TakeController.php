<?php

namespace App\Http\Controllers;

use Auth;
use Lang;
use App\Item;
use App\User;
use App\Events\ReturnItem;
use Illuminate\Http\Request;

/**
 * Responsible to Take and Return an Item.
 */
class TakeController extends Controller
{
    /**
     * The user take an item
     *
     * @param Request $request The form data
     * 
     * @return home view
     */
    public function store(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        if ($item->used_by) {
            return back()->withErrors(
                Lang::getFromJson("This item is already taken")
            );
        }
        $item->used_by = Auth::id();
        $item->save();
        return redirect('home');
    }

    /**
     * User return an item
     * Trigger an event: ReturnItem
     *
     * @param Request $request Form data
     * 
     * @return View home
     */
    public function delete(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        event(new ReturnItem($item));
        $item->returnItem();
        return redirect('home');
    }
}
