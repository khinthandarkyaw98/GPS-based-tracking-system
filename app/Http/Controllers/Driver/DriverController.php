<?php

namespace App\Http\Controllers\Driver;

//use Illuminate\Http\Request;
use App\Http\Requests\CreateDriverRequest;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('driver');
    }

    public function guard() {
        return auth()->guard('driver');
    }

    protected function index() {
        //auth()->user()->getAuthIdentifier();
        //find the vehicle of the driver and send it to the view
        return view('driver.driver-index');
    }

    protected function edit() {
        return view('driver.driver-myaccount');
    }

    protected function update(CreateDriverRequest $request) {
        $driver_id = auth()->driver()->driver_id;
        $driver = Driver::findOrFail($driver_id);
        $driver->driver_name = $request->get('driver_name');
        $driver->password = Hash::make($request->get('password'));
        $driver->phone = $request->get('phone');
        $driver->save();
        return redirect('/driver-profile')->with('success','Driver information is updated successfully.');
    }
}
