<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function store(Request $request)
    {
        $item = User::find(\Auth::id())->items()->find(request('item'));
        $item->used_by = null;
        $item->save();

        return redirect('home');
    }
}
