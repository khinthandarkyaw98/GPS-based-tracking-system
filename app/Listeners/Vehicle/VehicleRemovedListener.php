<?php

namespace App\Listeners\Vehicle;

use App\Events\Vehicle\VehicleRemoved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Schema;

class VehicleRemovedListener
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
     * @param  VehicleRemoved  $event
     * @return void
     */
    public function handle(VehicleRemoved $event)
    {
        $table_name = $event->vehicle->vehicle_number;
        Schema::connection('mysql')->drop(''.$table_name);
    }
}
