<?php

namespace App\Http\Controllers;

use \App\User;
use \App\Mail\UserWaiting;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function store(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        $item->waiting_user_id = \Auth::id();
        $item->timestamps = false;
        $item->save();

        $loggedUser = \Auth::user()->name;
        $userWithItem = User::find($item->used_by);
        \Mail::to($userWithItem)->send(
            new UserWaiting($loggedUser, $userWithItem->name, $item)
        );

        return redirect('home');
    }

    public function delete(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        $item->waiting_user_id = null;
        $item->timestamps = false;
        $item->save();

        return redirect('home');
    }
}
