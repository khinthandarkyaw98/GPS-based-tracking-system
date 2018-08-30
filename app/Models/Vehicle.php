<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'vehicle_name', 'vehicle_number', 'admin_id', 'driver_id', 'sim_number', 'gps_model', 'imei', 'description'
    ];

    protected $primaryKey = 'vehicle_id';

    public function admin() {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

    public function driver() {
        return $this->belongsTo('App\Models\Driver', 'driver_id')->withDefault();
    }

    public $timestamps = false;

    public function getRouteKeyName(){
        return 'vehicle_id';
    }
}
