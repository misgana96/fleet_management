<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Service;
use App\total;

class ServiceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');  
    }


    public function viewServices()
    {
    	$services = DB::table('services')
                    ->leftjoin('vehicles','vehicles.vehicle_id','=','services.vehicle')
                    ->paginate(10);

        return view('Services.viewServices',['services'=>$services]);	
    }

     public function viewService()
    {
        return view('Service.viewService');    
    }
    
    public function addServiceForm(){
        $vehicles = DB::table('vehicles')->select('vehicle_id','plate')->get();
    	return view('Services.newservices',['vehicles'=>$vehicles]);
    }
    public function addServiceSubmit(Request $request){
        $this->validate($request,[
                'vehicle' => 'required',
            ]);

    	$service = new Service();
        $service->service_id = $request->service_id;
        $service->total = $request->total;
        $service->plate = $request->plate;
        $service->odometer = $request->odometer;
        $service->attached_file = $request->attached_file;
    	$service->vin = $request->vin;
    	$service->vehicle = $request->vehicle;
    	$service->parts = $request->parts;
        $service->labor = $request->labor;
        $service->labago = $request->labago;
        $service->fuel = $request->fuel;
        $service->tire = $request->tire;
        $service->tire_infl = $request->tire_infl;
   
        if(isset($request->issue_id))
        {
            $service->issue = $request->issue_id;
        }

    	$service->save();

    	return redirect('/services'); 
    }


}
