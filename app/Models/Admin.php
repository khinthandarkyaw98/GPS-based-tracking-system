<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    public $timestamps = false;

    protected $fillable = [
        'admin_name', 'email', 'phone', 'password', 'activation_code', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $primaryKey ='admin_id';

    public function driver() {
        return $this->hasMany('App\Models\Driver', 'driver_id');
    }

    public function vehicle() {
        return $this->hasMany('App\Models\Vehicle', 'vehicle_id');
    }

    public function getRouteKeyName(){
        return 'admin_id';
    }
}
