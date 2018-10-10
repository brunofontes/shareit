<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use \App\User;
use \App\Mail\UserWaiting;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Store the waiting_user_id on db
     * so the user can be alerted when
     * the item is free
     *
     * @param Request $request Form data
     * 
     * @return redirect to home
     */
    public function store(Request $request)
    {
        $item = User::loggedIn()->items()->find(request('item'));
        $item->waiting_user_id = Auth::id();
        $item->timestamps = false;
        $item->save();

        $loggedUser = Auth::user()->name;
        $userWithItem = User::find($item->used_by);
        Mail::to($userWithItem)
            ->locale($userWithItem->language)
            ->send(new UserWaiting($loggedUser, $userWithItem->name, $item));

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
