<?php

namespace App\Listeners;

use Mail;
use App\User;
use App\Events\ReturnItem;
use App\Mail\ItemAvailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertReturnedItem
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Send an email to the user that
     * is waiting for the item
     *
     * @param  ReturnItem  $item
     * @return void
     */
    public function handle(ReturnItem $event)
    {
        if ($event->item->waiting_user_id) {
            $user = User::find($event->item->waiting_user_id);
            Mail::to($user)
                ->locale($user->language)
                ->send(new ItemAvailable($user->name, $event->item));
        }
    }
}
