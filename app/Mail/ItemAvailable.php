<?php

namespace App\Mail;

use \App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItemAvailable extends Mailable
{
    public $item;
    public $username;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, Item $item)
    {
        $this->item = $item;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(
            \Lang::getFromJson(
                ':itemname is available!',
                ['itemname' => $this->item->name]
            )
        )->markdown('emails.itemAvailable');
    }
}
