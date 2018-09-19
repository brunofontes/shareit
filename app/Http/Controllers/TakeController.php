<?php

namespace App\Http\Controllers;

use \App\Item;
use \App\User;
use App\Mail\ItemAvailable;
use Illuminate\Http\Request;

class TakeController extends Controller
{
    public function store(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        if ($item->used_by) {
            return back()->withErrors("This item is already taken");
        }
        $item->used_by = \Auth::id();
        $item->save();
        return redirect('home');
    }

    public function delete(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        $waiting_id = $item->waiting_user_id;
        $item->used_by = null;
        $item->waiting_user_id = null;
        $item->save();

        //Send e-mail to waiting user
        if ($waiting_id) {
            $user = User::find($waiting_id);
            \Mail::to($user)->send(
                new ItemAvailable($user->name, $item)
            );
        }

        return redirect('home');
    }
}
