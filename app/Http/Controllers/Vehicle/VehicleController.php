<?php

namespace App\Http\Controllers\Vehicle;

use App\Events\Vehicle\VehicleAdded;
use App\Events\Vehicle\VehicleRemoved;
use App\Events\Vehicle\VehicleUpdated;
use App\Http\Requests\CreateVehicleRequest;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehicleReportExport;

class VehicleController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
        //**$this->authorizeResource(Vehicle::class);
    }

    public function guard() {
        return auth()->guard('admin');
    }

    protected function create() {
        //if (!empty(auth()->user()->user_id)) {
        //$user_id = auth()->user()->user_id;
        //}
        //$admin_id = auth()->admin()->admin_id;
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $drivers = DB::table('drivers')->where('admin_id',$admin_id)->where('vehicle_id',null)->select('driver_id','driver_name')->get();
        //raw('select driver_id, driver_name from drivers where drivers.user_id ='.$user_id.'and drivers.vehicle_id=null');
        //**return view('vehicle.vehicles-create', compact('drivers'));
        return view('vehicle.vehicles-create', ['drivers'=>$drivers]);
    }

    protected function store(CreateVehicleRequest $request) {
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $driver_id = $request->driver_id;
        if($driver_id==0) {
            $driver_id=null;
        }
        $vehicle = new Vehicle([
            "vehicle_name" => $request->vehicle_name,
            "vehicle_number" => $request->get('vehicle_number'),
            "driver_id" => $driver_id,
            "admin_id" => $admin_id,
            "sim_number" => $request->get('sim_number'),
            "imei"=>$request->get('imei'),
            "gps_model" => "",
            "description" => $request->get('description')
        ]);

        $vehicle->save();
        if(!($vehicle->driver_id == null)) {
            DB::table('drivers')->where('driver_id', $vehicle->driver_id)->update(['vehicle_id'=> $vehicle->vehicle_id]);
        }
        event(new VehicleAdded($vehicle));
        return redirect('vehicles')->with('success', 'New vehicle is added successfully');
    }

    protected function index() {
        //$vehicles = Vehicle::all();
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $vehicles = DB::table('vehicles')->where('admin_id', $admin_id)->get();
        //$drivers = [];
        $drivers=array();
        //**var $drivers;
        foreach ($vehicles as $vehicle) {
            $drivers[] = DB::table('drivers')->where('driver_id', $vehicle->driver_id)->select('driver_name')->get();
            //**$drivers = DB::table('drivers')->where('driver_id', $vehicle->driver_id)->select('driver_name')->get();
            //$driver = DB::table('drivers')->where('driver_id', $vehicle->driver_id)->select('driver_name')->get();
            //array_push($drivers, $driver);
        }

        return view('vehicle.vehicles', ['vehicles'=>$vehicles, 'drivers'=>$drivers]);
    }

    protected function edit($vehicle_id) {
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $vehicle = Vehicle::find($vehicle_id);
        $drivers = DB::table('drivers')->where('admin_id',$admin_id)->where('vehicle_id',null)->orWhere('vehicle_id',$vehicle_id)->select('driver_id','driver_name')->get();
        return view('vehicle.vehicles-edit', ['vehicle'=>$vehicle, 'drivers'=>$drivers]);
    }

//**protected function update(CreateVehicleRequest $request, $vehicle_id_passed) {
    protected function update(Request $request, $vehicle_id_passed) {
        $vehicle_id=$vehicle_id_passed;
        $driver_id = $request->driver_id;
        $driver_db = DB::table('drivers')->where('vehicle_id', $vehicle_id)->first();
        //return view('test', ['data'=>$driver_db]);
        if($driver_id==0) {
               $driver_id=null;
               if(!($driver_db==null)) {
                   $driver_db_id = $driver_db->driver_id;
                   DB::table('drivers')->where('driver_id', $driver_db_id)->update(['vehicle_id'=>null]);
               }
        }else{
               if(!($driver_db==null)) {
                   $driver_db_id = $driver_db->driver_id;
                   DB::table('drivers')->where('driver_id', $driver_db_id)->update(['vehicle_id'=>null]);
               }
               DB::table('drivers')->where('driver_id', $driver_id)->update(['vehicle_id'=> $vehicle_id]);
        }

        $vehicle = Vehicle::findOrFail($vehicle_id);
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_number = $request->vehicle_number;
        $vehicle->driver_id = $driver_id;
        $vehicle->sim_number= $request->sim_number;
        $vehicle->imei= $request->imei;
        $vehicle->gps_model = '';
        $vehicle->description=$request->description;
        $vehicle->save();
        event(new VehicleUpdated($vehicle));
        return redirect('vehicles')->with('success','Vehicle information is updated successfully');

    }

    protected function destroy($vehicle_id) {
		$vehicle = Vehicle::findOrFail($vehicle_id);
        event(new VehicleRemoved($vehicle));
        Vehicle::destroy($vehicle_id);
        return redirect('vehicles')->with('success','Vehicle is deleted successfully');
    }
	
	protected function export(Request $request) {
	    $vehicle_number = $request->vehicle_number;
		$vehicle = DB::table('vehicles')->where('vehicle_number',$vehicle_number)->first();
		$admin_id = Auth::guard('admin')->user()->admin_id;
/**
		if($admin_id == $vehicle->admin_id) {
            $data1=collect([
              [
                "id"=>"id",
                "time"=>"time",
                "latitude"=>"latitude",
                 "longitude"=>"longitude",
                "speed"=>"speed",
                "satellites"=>"satellites"
              ],
             ]);
			$data2 = DB::table($vehicle_number)->get();
			$data = $data1->concat($data2);
			//return view('test', ['data'=>$data]);
			return Excel::download(new VehicleReportExport($data), 'report.xlsx');
		}else{
			return redirect('vehicles')->with('success', 'You can export reports only on vehicles you have registered');
		}
		**/
		if($vehicle==null || !($admin_id == $vehicle->admin_id)) {
               return redirect('vehicles')->with('success', 'You can export reports only on vehicles you have registered');
        		}else{
        			$data1=collect([
                                          [
                                            "id"=>"No.",
                                            "time"=>"time",
                                            "latitude"=>"latitude",
                                             "longitude"=>"longitude",
                                            "speed"=>"speed",
                                            "satellites"=>"satellites"
                                          ],
                                         ]);
                            			$data2 = DB::table($vehicle_number)->get();
                            			$data = $data1->concat($data2);
                            			//return view('test', ['data'=>$data]);
                            			return Excel::download(new VehicleReportExport($data), 'report.xlsx');

        		}
	}
}
