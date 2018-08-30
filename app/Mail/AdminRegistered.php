<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Admin;

class AdminRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $admin;
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->from(env('MAIL_USERNAME'))
                ->view('email.adminRegistered');
				
		//->with([
                     //'orderName' => $this->order->name,
                     //   'orderPrice' => $this->order->price,
                    //]);		
        //return $this->view('view.name');
		//->text('emails.orders.shipped_plain');
    }
}
