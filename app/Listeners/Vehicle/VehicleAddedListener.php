<?php

namespace App\Listeners\Vehicle;

use App\Events\Vehicle\VehicleAdded;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VehicleAddedListener
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
     * @param  VehicleAdded  $event
     * @return void
     */
    public function handle(VehicleAdded $event)
    {
        $table_name = $event->vehicle->vehicle_number;
        Schema::connection('mysql')->create(''.$table_name , function (Blueprint $table) {
           $table->increments('id');
           $table->timestamp('time');
           $table->decimal('latitude', 10, 8);
           $table->decimal('longitude', 11, 8);
		   $table->integer('speed');
		   $table->integer('satellites');
        });

		//VehicleLocation $table_name = new VehicleLocation();
		//$table_name->table=''.$table_name;
    }
}
