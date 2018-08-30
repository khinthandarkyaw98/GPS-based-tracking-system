<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Driver extends Authenticatable
{
    use Notifiable;

    protected $guard = 'driver';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_name', 'admin_id', 'vehicle_id', 'email', 'password', 'phone', 'activatiion_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey ='driver_id';

    public function admin() {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }

    public function vehicle() {
        return $this->hasOne('App\Models\Vehicle', 'vehicle_id')->withDefault();
    }

    public $timestamps = false;

    public function getRouteKeyName(){
        return 'driver_id';
    }
}
