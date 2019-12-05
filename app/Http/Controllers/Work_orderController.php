<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Work_order;
use App\Notifications\DbNotification;
class Work_orderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function viewWork_orders(){
    	$work_orders = DB::select('select * from work_orders');
        return view('work_orders.viewwork_orders',['work_orders'=>$work_orders]);	
    }
    public function addWork_orderForm()
    {
        return view('work_orders.newwork_order');	
    }
    public function addWork_orderSubmit(Request $request)
    {
        $this->validate($request,[
                'user_name' => 'required',
                'jour_name' => 'required',
                'serv_location' => 'required',
                'serv_length' => 'required',
                'serv_initial_time' => 'required',
                'serv_exp_time' => 'required',
                'serv_case' => 'required',
            ]);
         $work_order = new Work_order();
    	$work_order->user_name = $request->user_name;
        $work_order->user_id= Auth::user()->id;
    	$work_order->jour_name = $request->jour_name;
    	$work_order->serv_location = $request->serv_location;
        $work_order->serv_initial_time = $request->serv_initial_time;
        $work_order->serv_exp_time = $request->serv_exp_time;
        $work_order->serv_length = $request->serv_length;
        $work_order->serv_case = $request->serv_case;
    	$work_order->save();
    	return redirect('/work_orders'); 
    }
}
