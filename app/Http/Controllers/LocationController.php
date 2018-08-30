<?php

namespace App\Http\Controllers;

use App\Models\VehicleLocation;
use Illuminate\Http\Request;
use App\Events\SendLocation;

class LocationController extends Controller
{
        protected $location;
        public function __construct()
        {

        }

        protected function getLocation(Request $request) {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $speed = $request->input('speedOTG');
            $satellites = $request->input('satellites');
            $time = $request->input('time');
            $prev_location;
            $location = new VehicleLocation([
                "latitude"=>$latitude,
                "longitude"=>$longitude,
                "speed"=>$speed,
                "satellites"=>$satellites,
                "time"=>$time,
            ]);
            $location->save();
            event(new SendLocation($location));
            //return view('location', ['latitude'=>$latitude]);
            //return view('first');
        }
}
