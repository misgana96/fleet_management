<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Driver;

class DriverController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');    
        $this->middleware('role:admin');    
    }

    //
    public function viewDrivers()
    {
        $drivers = DB::select('select * from drivers');

        return view('drivers.viewdrivers',['drivers'=>$drivers]);	
    }

    //
    public function viewDriver(Request $request)
    {
        $driver_enquiry = Driver::where('driver_id', '=', $request->id)->first();
     if ($driver_enquiry!=null) {
     $driver = DB::table('drivers')->where('driver_id','=',$request->id)->get();
        }
        return view('drivers.viewdriver',
            [
                'tab'=>'general_info',
                'driver_enquiry' => $driver_enquiry,
                'driver' => $driver
            ]);  
    }

    //
    public function addDriverForm()
    {
        return view('drivers.newdriver'); 
    }

    //
    public function addDriverSubmit(Request $request)
    {
        $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'emergency_phone' => 'required',
                'address' => 'required',
                'birth' => 'required',
                'sex' => 'required',
                'hired_on' => 'required',
                'plate' => 'required',
                'image' => 'image|file|max:2000',
            ]);

        $target_path="image/";
        $target_path=$target_path.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);

    	//return $request->all();
    	$driver = new Driver();
    	$driver->first_name = $request->first_name;
    	$driver->last_name = $request->last_name;
        $driver->birth = $request->birth;
        $driver->image = $target_path;
    	$driver->email = $request->email;
        $driver->phone = $request->phone;
        $driver->emergency_phone = $request->emergency_phone;
        $driver->hired_on = $request->hired_on;
        $driver->sex = $request->sex;
        $driver->address = $request->address;
        $driver->plate = $request->plate;
    	$driver->save();
    	return redirect('/drivers'); 
    }

    public function editDriverForm(Request $request)
    {
        $driver= DB::table('drivers')->where('driver_id','=',$request->id)->get();
        return view('drivers.newdriver',['driver' => $driver]); 
    }

    public function editDriverSubmit(Request $request)
    {
        $this->validate($request,[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'emergency_phone' => 'required',
                'address' => 'required',
                'birth' => 'required',
                'sex' => 'required',
                'hired_on' => 'required',
                'plate' => 'required',
                'image' => 'image|file|max:2000',
            ]);

        $driver = Driver::find($request->id);

        $driver->first_name = $request->first_name;
        $driver->last_name = $request->last_name;
        $driver->birth = $request->birth;
        $driver->email = $request->email;
        $driver->phone = $request->phone;
        $driver->emergency_phone = $request->emergency_phone;
        $driver->hired_on = $request->hired_on;
        $driver->sex = $request->sex;
        $driver->address = $request->address;
        $driver->plate = $request->plate;

        if(!empty($_FILES['image']) && $_FILES['image']['name'] != "") {
            $target_path="image/";
            $target_path=$target_path.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
            $driver->image = $target_path;
        }

        $driver->save();
        return redirect('/drivers'); 
    }
    public function deleteDriverForm(Request $request){
      DB::table('drivers')->where('driver_id', '=', $request->id)->delete();
        return redirect('/drivers'); 
    }
}
