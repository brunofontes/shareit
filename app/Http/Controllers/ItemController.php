<?php

namespace App\Http\Controllers;

use \App\Item;
use \App\User;
use App\FlashMessage as flash;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        if (!$item || $item->product->user_id != \Auth::id()) {
            session()->flash(
                flash::DANGER,
                \Lang::getFromJson(
                    "The item doesn't exist."
                )
            );
            return back();
        }
        $users = $item->users()->get();

        $otherItems = Item::where([['product_id', $item->product_id], ['id', '!=', $id]])->get();
        return view('item', compact('item', 'otherItems', 'users'));
    }

    public function index()
    {
        $items = Item::fromAuthUser()->get();
        return view('item.index', compact('items'));
    }

    /**
     * Stores the included item into database
     * As the items are included on the Product view,
     * it must return to there after inclusion
     *
     * @return (view) The product view
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'item' => 'required',
                'product_id' => 'required'
            ]
        );

        $authUser = User::loggedIn();
        $authUser->items()->create(['name' => request('item'), 'product_id' => request('product_id')]);

        return redirect('product/' . request('product_id'));
    }

    public function patch(Request $request)
    {
        $request->validate(['item' => 'required', 'name' => 'required']);
        $item = User::loggedIn()->items()->find(request('item'));
        $item->name = request('name');
        $item->save();
        return redirect('item/' . request('item'));
    }

    public function delete(Request $request)
    {
        $request->validate(['item' => 'required']);
        $item = User::loggedIn()
            ->items()->with('users')->find(request('item'));
        $product = $item->product_id;

        Item::deleteAndDetach($item);
        return redirect('product/' . $product);
    }
}
