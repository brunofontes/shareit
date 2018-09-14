<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::find(\Auth::id())->items()->get();
        foreach ($items as $item) {

            if ($item->used_by) {
                $users[$item->used_by] = User::find($item->used_by)->name;

                if ($item->waiting_user_id) {
                    $users[$item->waiting_user_id] = User::find($item->waiting_user_id)->name;
                }
            }
        }
        return view('home', compact('items', 'users'));
    }
}
