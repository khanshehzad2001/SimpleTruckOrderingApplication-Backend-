<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $message;

    public function __construct(Order $order, $message = null)
    {
        $this->order = $order;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.order_status_update')
                    ->with([
                        'order' => $this->order,
                        'message' => $this->message,
                    ]);
    }
}
