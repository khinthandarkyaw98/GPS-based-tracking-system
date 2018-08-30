<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\
class SendLocationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $data;
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendLocation $event)
    {
        Echo.channel('location')
            .listen('SendLocation', (e)=> {
                this.data = e.location;
    }
}
