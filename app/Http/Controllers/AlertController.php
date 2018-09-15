<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function store(Request $request)
    {
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->waiting_user_id = \Auth::id();
        $item->timestamps = false;
        $item->save();
        return redirect('home');
    }

    public function delete(Request $request)
    {
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->waiting_user_id = null;
        $item->timestamps = false;
        $item->save();

        return redirect('home');
    }
}
