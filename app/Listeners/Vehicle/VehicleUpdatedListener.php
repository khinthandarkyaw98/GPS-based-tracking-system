<?php

namespace App\Listeners\Vehicle;

use App\Events\Vehicle\VehicleUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class VehicleUpdatedListener
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
     * @param  VehicleUpdated  $event
     * @return void
     */
    public function handle(VehicleUpdated $event)
    {
        //DB::table('drivers')->where('driver_id', $event->vehicle->driver_id)->update('vehicle_id', $event->vehicle->vehicle_id);
    }
}
