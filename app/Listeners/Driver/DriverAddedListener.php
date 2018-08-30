<?php

namespace App\Listeners\Driver;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Driver\DriverAdded;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DriverAddedListener
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
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DriverAdded $event)
    {
        //
    }
}
