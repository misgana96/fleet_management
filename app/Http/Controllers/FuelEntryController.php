<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Issue;
use App\Vehicle;
use App\FuelEntry;

class FuelEntryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    //
    public function viewFuelEntries()
    {

    	$fuelentries = DB::table('fuelentries')
    					->leftjoin('vehicles','vehicles.vehicle_id','=','fuelentries.vehicle')
    					->paginate(10);

        return view('fuelentries.viewfuelentries',['fuelentries'=>$fuelentries]);	
    }

    //
    public function viewFuelEntry()
    {
        return view('fuelentries.viewfuelentries');	
    }

    //
    public function addFuelEntryForm()
    {
    	$vehicles = DB::table('vehicles')->select('vehicle_id','vehicle_name')->get();
        return view('fuelentries.newfuelentries',['vehicles'=>$vehicles]);		
    }

    //
    public function addFuelEntrySubmit(Request $request)
    {
        if($request->vehicle != "")
        {
            $vehicles = DB::table('vehicles')->select('fuel_tank')
                        ->where('vehicle_id',$request->vehicle)
                        ->get(); 
            $max_fuel_tank = $vehicles['0']->fuel_tank;
        }

    	$this->validate($request,[
                'vehicle' => 'required',
                'fuelentry_date' => 'required',
                'price_unit' => 'required',
                'meter_start' => 'required',
                'fill_up' => 'required',
                'amount' => 'numeric|max:$max_fuel_tank',
                'vendor' => 'required',
                'invoice_number' => 'required'
            ]);

    	//return $request->all();
    	$fuelentry = new FuelEntry();
    	$fuelentry->vehicle = $request->vehicle;
    	$fuelentry->fuelentry_date = $request->fuelentry_date;
    	$fuelentry->price_unit = $request->price_unit;
    	$fuelentry->meter_start = $request->meter_start;
    	$fuelentry->vendor = $request->vendor;
    	$fuelentry->invoice_number = $request->invoice_number;

    	if($request->fill_up==1)
    	{
    		$fuelentry->amount = $vehicles['0']->fuel_tank;
    	}
    	else
    	{
    		$fuelentry->amount = $request->amount;
    	}

    	$fuelentry->save();

    	return redirect('/fuelentries'); 
    }
}
