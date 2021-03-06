<?php

namespace App\Http\Controllers;

use \App\Mail\UserWaiting;
use \App\User;
use App\FlashMessage;
use Auth;
use Illuminate\Http\Request;
use Mail;

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
        if (!$item->used_by) {
            session()->flash(
                FlashMessage::PRIMARY,
                __('Oh! This item has just being returned. Take it before anyone else!')
            );
            return redirect('home');
        }

        if ($item->used_by == Auth::id()) {
            return redirect('home');
        }

        $item->storeAlert();

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

        if ($item->waiting_user_id != Auth::id()) {
            return redirect('home');
        }

        $item->removeAlert();
        return redirect('home');
    }
}
