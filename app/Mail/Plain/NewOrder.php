<?php

namespace App\Mail\Plain;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $order_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Событие new_order')->view('emails.plain.new_order');
    }
}
