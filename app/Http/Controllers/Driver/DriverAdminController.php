<?php
namespace App\Http\Controllers\Driver;

use App\Http\Requests\CreateDriverRequest;
use App\Http\Requests\EditDriverRequest;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Events\Driver\DriverRemoved;
use App\Events\Driver\DriverUpdated;

class DriverAdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function guard() {
        return auth()->guard('admin');
    }

    protected function index() {
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $drivers=DB::table('drivers')->where('admin_id', $admin_id)->whereNull('activatiion_code')->get();
        $vehicles =array();
        foreach ($drivers as $driver) {
            $vehicles[] = DB::table('vehicles')->where('driver_id', $driver->driver_id)->select('vehicle_number')->get();
        }
        return view('driver.drivers', ['drivers'=>$drivers, 'vehicles'=>$vehicles]);
    }

    protected function edit($driver_id) {
        $driver=Driver::findOrFail($driver_id);
        return view('driver.driver-edit', ['driver'=>$driver]);
    }

//**protected function update(EditDriverRequest $request, $driver_id) {
    protected function update(Request $request, $driver_id) {
        $driver = Driver::findOrFail($driver_id);
        $driver->driver_name = $request->get('driver_name');
        $driver->phone = $request->get('phone');
        event(new DriverUpdated($driver));
        $driver->save();
        return redirect('drivers')->with('success','Driver information is updated successfully.');
    }

    protected function destroy($driver_id) {
        DB::table('vehicles')->where('driver_id',$driver_id)->update(['driver_id'=>null]);
        $driver=Driver::findOrFail($driver_id);
        event(new DriverRemoved($driver));
        Driver::destroy($driver_id);
        return redirect('drivers')->with('success','Driver is deleted successfully');
    }
}

