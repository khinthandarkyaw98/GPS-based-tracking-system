<?php

namespace App\Http\Controllers\Driver\DriverAuth;

use App\Http\Requests\CreateDriverRequest;
use App\Http\Controllers\Controller;
use App\Notifications\DriverRegisteredSuccessfully;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Events\Driver\DriverAdded;
use App\Mail\DriverRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Auth;

class DriverRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function guard() {
        return auth()->guard('admin');
    }

    protected function showRegistrationForm() {
        return view('driver.driver-auth.driver-register');
    }
/**
    protected function store(CreateDriverRequest $request) {
        //$driver = Driver::create([
        $driver = new Driver([
            'driver_name' => $request->driver_name,
            'admin_id' => Auth::guard('admin')->user()->admin_id,
            'vehicle_id' => null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            //**'activatiion_code' => str_random(30).time(),
            //'remember_token' =>null,
        ]);
        //$driver->notify(new DriverRegisteredSuccessfully($driver));
        //**event(new DriverAdded($driver));
        //**Mail::to($request->'email')->send(new DriverRegistered($driver));
        $driver->save();
        return redirect('drivers')->with('success', 'New driver account is registered. The driver will receive an email to activate the account.');
    }
    **/


    protected function create(array $data){
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $driver = Driver::create([
            'driver_name' => $data['driver_name'],
            'admin_id'=> $admin_id,
            'vehicle_id' => null,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'activatiion_code' => str_random(30).time(),
        ]);

    	Mail::to($data['email'])->send(new DriverRegistered($driver));
        return $driver;
    }

//**public function register(CreateDriverRequest $request) {
    public function register(Request $request) {
        //**$this->validator($request->all())->validate();
        event(new Registered($driver=$this->create($request->all())));
        //event(new DriverAdded($driver));
        //$admin=$this->create($request->all());
        return redirect('drivers')->with('success','New driver account is registered. The driver will receive an email to activate the account.');
    }

}
