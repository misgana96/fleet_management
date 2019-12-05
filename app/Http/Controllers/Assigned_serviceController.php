<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Assigned_service;
use App\Notifications\DbNotification;
use App\notification;
class Assigned_serviceController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function viewAssigned_services(){
      $assigned_services = DB::select('select * from assigned_services');
return view('assigned_services.viewassigned_services',['assigned_services'=>$assigned_services]); 
    }
    //
    public function viewaAssigned_service(){
        return view('assigned_services.viewassigned_service');  
    }
    public function addAssigned_serviceForm(){
        return view('assigned_services.newassigned_service');   
    }
    public function addAssigned_serviceSubmit(Request $request){
        $this->validate($request,[
                'serv_id' => 'required',
                'plate' => 'required',
                'initial_meter_reading' => 'required',
            ]);
        
      $u = DB::table('users')
                ->leftjoin('work_orders', 'work_orders.user_id','=','users.id')
               ->where('work_orders.serv_id','=',$request->serv_id)
               ->get();
      
        $user =User::find($u[0]->user_id);
        $user->notify(new DbNotification($user));
        $connect=mysqli_connect("localhost","root","","fleetmanagement");
        $w="SELECT user_id from work_orders where serv_id = '$request->serv_id'";
        $result=mysqli_query($connect,$w);
        $row=mysqli_fetch_array($result);
       $assigned_service = new Assigned_service();
        $assigned_service->serv_id = $request->serv_id;
        $assigned_service->user_id =$row[0];
        $assigned_service->plate = $request->plate;
        $assigned_service->initial_meter_reading = $request->initial_meter_reading;
        $assigned_service->save();
        $link=mysqli_connect("localhost","root","","fleetmanagement");
        $ww=$u[0]->user_id;
       mysqli_query($link,"UPDATE notifications set plate='$request->plate' where notifiable_id='$ww'");
        return redirect('/assigned_services/add'); 
    }
        public function deleteAssigned_serviceForm(Request $request){
 DB::table('assigned_services')->where('serv_id', '=', $request->serv_id)->delete();
 DB::table('work_orders')->where('serv_id', '=', $request->serv_id)->delete();
        return redirect('/assigned_services'); 
    }
}