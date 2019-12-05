<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Finished_service;
use App\Notifications\DbfinishNotification;

class Finished_serviceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function viewFinished_services(){

        $finished_services = DB::select('select * from finished_services');

        return view('assigned_services.viewfinished_services',['finished_services'=>$finished_services]);   
    }
          public function viewerrors(){

        return view('assigned_services.viewerrors');   
    }

    //
     public function viewaFinished_service(){
        return view('assigned_services.viewfinished_service');  
    }
    public function addFinished_serviceForm(){
        return view('assigned_services.newfinished_service');   
    }
     public function addFinished_serviceSubmit(Request $request){
        $this->validate($request,[
                'serv_id' => 'required',
                'final_meter_reading' => 'required',
            ]);
          $u = DB::table('users')
            ->leftjoin('work_orders', 'work_orders.user_id','=','users.id')
               ->where('work_orders.serv_id','=',$request->serv_id)
               ->get();
        $user =User::find($u[0]->user_id);
      //$user->notifications()->delete();
        $user->notify(new DbfinishNotification($user));
        $finished_service = new Finished_service();
        $finished_service->serv_id = $request->serv_id;
        $finished_service->final_meter_reading = $request->final_meter_reading;
        $link=mysqli_connect("localhost","root","","fleetmanagement");
         $p=mysqli_query($link,"SELECT initial_meter_reading from assigned_services where serv_id='$request->serv_id'");
         $row=mysqli_fetch_array($p);
        if($request->final_meter_reading <= $row[0]){
            return redirect('/meter_errors'); 
    }
        else{
            $finished_service->save();
        $l=mysqli_query($link,"SELECT plate from assigned_services where serv_id='$request->serv_id'");
        $row =mysqli_fetch_array($l);
        $w= $row["plate"];
        $ww=$u[0]->user_id;
        mysqli_query($link,"UPDATE notifications set plate='$w' where notifiable_id='$ww'");
        return redirect('/finished_services/add'); 
    }
}
            public function deleteFinished_serviceForm(Request $request){
      DB::table('finished_services')->where('serv_id', '=', $request->serv_id)->delete();
      DB::table('assigned_services')->where('serv_id', '=', $request->serv_id)->delete();
        return redirect('/finished_services'); 
    }
}
