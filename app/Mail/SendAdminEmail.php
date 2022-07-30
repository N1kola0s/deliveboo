<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $my_order;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->my_order = $data;
       
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('mail.orders.created')
        ->subject('Nuovo ordine richiesto')
        ->with(['order'=> $this->my_order]);
       
    }
}
