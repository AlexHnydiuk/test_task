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
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id, $event)
    {
        $this->order_id = $order_id;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Событие ' . $this->event)->view('emails.plain.new_order');
    }
}
