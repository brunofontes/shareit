<?php

namespace App\Mail;

use \App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Lang;

class UserWaiting extends Mailable
{
    public $item;
    public $waitingUser;
    public $userWithItem;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($waitingUser, $userWithItem, Item $item)
    {
        $this->item = $item;
        $this->waitingUser = $waitingUser;
        $this->userWithItem = $userWithItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(
            Lang::get(
                ':waitinguser wants to use :itemname',
                [
                    'waitinguser' => $this->waitingUser,
                    'itemname' => $this->item->name
                ]
            )
        )->markdown('emails.userWaiting');
    }
}
