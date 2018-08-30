<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleLocation extends Model
{
    protected $fillable = [
        'latitude', 'longitude', 'speed', 'satellites', 'time'
    ];

    public $timestamps = false;
	protected $table='location';
    protected $primaryKey = 'id';
}


