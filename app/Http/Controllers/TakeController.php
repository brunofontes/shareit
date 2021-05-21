<?php

namespace App\Http\Controllers;

use App\Events\ReturnItem;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Lang;

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

        try {
            $item->takeItem();
        } catch (\Exception $e) {
            return back()->withErrors(
                Lang::getFromJson('This item is already taken')
            );
        }

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

        try {
            $item->returnItem();
        } catch (\Exception $e) {
            return back()->withErrors(
                Lang::getFromJson("You cannot return an item that is not with you")
            );
        }

        event(new ReturnItem($item));
        return redirect('home');
    }
}
