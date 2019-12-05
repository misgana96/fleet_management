<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Issue;
use App\vehicle;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');    
        $this->middleware('role:admin');    
    }

    public function report()
    {
        $vehicles = DB::table('vehicles')->select('vehicle_id','vehicle_name')->get();
        return view('report',['vehicles'=>$vehicles]); 
    }

    public function reportSubmit(Request $request)
    {
         $this->validate($request,[
                'vehicle' => 'required',
                'type' => 'required',
                'from_date' => 'required|before:today',
                'to_date' => 'required|after:from_date|before:tomorrow',
            ]);


        $vehicles = DB::table('vehicles')->select('vehicle_id','vehicle_name')->get();

        switch($request->type) {
            case 1:
                if($request->vehicle == 0)
                {
                    $fuelentries = DB::select("select vehicle_id, vehicle_name,sum(amount*price_unit) as price_unit, sum(amount) as amount 
                        from fuelentries 
                        left join vehicles on vehicles.vehicle_id=fuelentries.vehicle 
                        where fuelentries.fuelentry_date between ?  AND ? 
                        group by vehicle ",[$request->from_date,$request->to_date]);

                    return view('report',[
                        'vehicles' => $vehicles,
                        'fuelentrys' => $fuelentries
                    ]);
                }
                else
                {

                    $fuelentries = DB::table('fuelentries')
                        ->leftjoin('vehicles','vehicles.vehicle_id','=','fuelentries.vehicle')
                        ->where('vehicle_id',$request->vehicle)
                        ->get();   

                    return view('report',[
                        'vehicles' => $vehicles,
                        'fuelentries' => $fuelentries
                    ]);
                }
                break;
            case 2:
                if($request->vehicle == 0)
                {
                    $issues = DB::table('issues')
                        ->leftjoin('vehicles','vehicles.vehicle_id','=','issues.vehicle')
                        ->get();

                    return view('report',[
                        'vehicles' => $vehicles,
                        'issues' => $issues
                    ]);
                }
                else
                {

                    $issues = DB::table('issues')
                        ->leftjoin('vehicles','vehicles.vehicle_id','=','issues.vehicle')
                        ->where('vehicle_id',$request->vehicle)
                        ->get();   

                    return view('report',[
                        'vehicles' => $vehicles,
                        'issues' => $issues
                    ]);
                }
                break;
            case 3:
                if($request->vehicle == 0)
                {
                    $services = DB::select("select vehicle_name, vehicles.plate, vehicle_id as service_id, sum(parts) parts, sum(labago) as labago, sum(labor) as labor, sum(fuel) as fuel, sum(tire) as tire, sum(tire_infl) as tire_infl
                        from services 
                        left join vehicles on vehicles.vehicle_id=services.vehicle 
                        where services.created_at between ?  AND ? 
                        group by vehicle_id ",[$request->from_date,$request->to_date]);

                    return view('report',[
                        'vehicles' => $vehicles,
                        'services' => $services
                    ]);
                }
                else
                {

                    $services = DB::table('services')
                        ->leftjoin('vehicles','vehicles.vehicle_id','=','services.vehicle')
                        ->get();   

                    return view('report',[
                        'vehicles' => $vehicles,
                        'services' => $services
                    ]);
                }
                break;
            default:
                break;
        }

    }
}
