<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Vehicle;

class VehicleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    //
    public function viewVehicles()
    {

    	$vehicles = Vehicle::paginate(10);

        return view('vehicles.viewvehicles',['vehicles' => $vehicles]);	
    }

    //
    public function viewVehicle(Request $request)
    {
        $vehicle_enquiry = Vehicle::where('vehicle_id', '=', $request->id)->first();
        if ($vehicle_enquiry!=null) {
            $vehicle = DB::table('vehicles')->where('vehicle_id','=',$request->id)->get();
        }

        return view('vehicles.viewvehicle',
            [
                'tab'=>'general_info',
                'vehicle_enquiry' => $vehicle_enquiry,
                'vehicle' => $vehicle
            ]);  
    }

    //
    public function viewVehicleServices(Request $request)
    {
        $vehicle_enquiry = Vehicle::where('vehicle_id', '=', $request->id)->first();
        if ($vehicle_enquiry!=null) {
            $services = DB::table('services')
                    ->leftjoin('vehicles','vehicles.vehicle_id','=','services.vehicle')
                    ->where('vehicle_id',$request->id)
                    ->paginate(10);
        }
       
        return view('vehicles.viewvehicle',
            [
                'tab'=>'services',
                'vehicle_enquiry' => $vehicle_enquiry,
                'services' => $services
            ]);  
    }

    //
    public function viewVehicleIssues(Request $request)
    {
        $vehicle_enquiry = Vehicle::where('vehicle_id', '=', $request->id)->first();
        if ($vehicle_enquiry!=null) {
            $issues = DB::table('issues')
                    ->leftjoin('vehicles','vehicles.vehicle_id','=','issues.vehicle')
                    ->where('vehicle_id',$request->id)
                    ->paginate(10);
        }

        return view('vehicles.viewvehicle',
            [
                'tab'=>'issues',
                'vehicle_enquiry' => $vehicle_enquiry,
                'issues' => $issues
            ]);  
    } 

    //
    public function viewVehicleFuelLog(Request $request)
    {
        $vehicle_enquiry = Vehicle::where('vehicle_id', '=', $request->id)->first();
        if ($vehicle_enquiry!=null) {
            $fuelentries = DB::table('fuelentries')
                    ->leftjoin('vehicles','vehicles.vehicle_id','=','fuelentries.vehicle')
                    ->where('vehicle_id',$request->id)
                    ->paginate(10);
        }

        return view('vehicles.viewvehicle',
            [
                'tab'=>'fuel_log',
                'vehicle_enquiry' => $vehicle_enquiry,
                'fuelentries' => $fuelentries
            ]);  
    }

    //
    public function viewVehicleWorkOrders(Request $request)
    {
        $vehicle_enquiry = Vehicle::where('vehicle_id', '=', $request->id)->first();
        if ($vehicle_enquiry!=null) {
            $work_orders = DB::table('finished_services')
                    ->leftjoin('vehicles','vehicles.vehicle_id','=','finished_services.vehicle')
                    ->leftjoin('work_orders','finished_services.serv_id','=','work_orders.serv_id')
                    ->leftjoin('assigned_services','finished_services.serv_id','=','assigned_services.serv_id')
                    ->where('vehicle_id',$request->id)
                    ->paginate(10);
        }
       
        return view('vehicles.viewvehicle',
            [
                'tab'=>'work_orders',
                'vehicle_enquiry' => $vehicle_enquiry,
                'work_orders' => $work_orders
            ]); 
    }

    //
    public function addVehicleForm()
    {
        $drivers = DB::table('users')->where('role','=','driver')->get();
        return view('vehicles.newvehicle',['drivers'=>$drivers]); 
    }

    //
    public function editVehicleForm(Request $request)
    {
        $drivers = DB::table('users')->where('role','=','driver')->get();
        $vehicle = DB::table('vehicles')->where('vehicle_id','=',$request->id)->get();
        return view('vehicles.newvehicle',['vehicle' => $vehicle, 'drivers' => $drivers]); 
    }
    //
    public function editVehicleSubmit(Request $request) 
    {    
            $this->validate($request,[
                'vehicle_name' => 'bail|required|max:50',
                'vehicle_type' => 'required',
                'vehicle_image' => 'image|file|max:2000',
                'make' => 'required',
                'model' => 'required',
                'manufacture_year' => 'required',
                'color' => 'required|string',
                'engine' => 'required',
                'vin' => 'required',
                'plate' => 'required',
                'fuel_tank' => 'required',
                'primary_meter' => 'required|numeric',
            ]);


        $vehicle = Vehicle::find($request->id);

        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->model = $request->model;
        $vehicle->make = $request->make;
        $vehicle->color = $request->color;
        $vehicle->manufacture_year = $request->manufacture_year;
        $vehicle->engine = $request->engine;
        $vehicle->plate = $request->plate;
        $vehicle->vin = $request->vin;
        $vehicle->fuel_type = $request->fuel;
        $vehicle->fuel_tank = $request->fuel_tank;
        $vehicle->primary_meter = $request->primary_meter;

        if(!empty($_FILES['vehicle_image']) && $_FILES['vehicle_image']['name'] != "") {
            $target_path="image/";
            $target_path=$target_path.$_FILES['vehicle_image']['name'];
            move_uploaded_file($_FILES['vehicle_image']['tmp_name'], $target_path);
            $vehicle->vehicle_image = $target_path;
        }

        $vehicle->save();
        
        return redirect('/vehicles'); 
    }

    //
    public function addVehicleSubmit(Request $request)
    {
        $this->validate($request,[
                'vehicle_name' => 'bail|required|max:50|unique:vehicles',
                'vehicle_type' => 'required',
                'vehicle_image' => 'required|image|file|max:2000',
                'make' => 'required',
                'model' => 'required',
                'manufacture_year' => 'required',
                'color' => 'required',
                'engine' => 'required|unique:vehicles',
                'vin' => 'required|unique:vehicles',
                'plate' => 'required',
                'fuel' => 'required',
                'fuel_tank' => 'required',
                'primary_meter' => 'required',
            ]);

        $target_path="image/";
        $target_path=$target_path.$_FILES['vehicle_image']['name'];
        move_uploaded_file($_FILES['vehicle_image']['tmp_name'], $target_path);

    	$vehicle = new Vehicle();
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_image = $target_path;
    	$vehicle->model = $request->model;
        $vehicle->make = $request->make;
    	$vehicle->color = $request->color;
        $vehicle->manufacture_year = $request->manufacture_year;
    	$vehicle->engine = $request->engine;
        $vehicle->plate = $request->plate;
        $vehicle->vin = $request->vin;
        $vehicle->fuel_type = $request->fuel;
        $vehicle->fuel_tank = $request->fuel_tank;
        $vehicle->primary_meter = $request->primary_meter;
    	$vehicle->save();
    	return redirect('/vehicles'); 
    }
}
