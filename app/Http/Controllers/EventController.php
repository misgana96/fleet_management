<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Event;
class EventController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function viewEvents()
    {

    	$events = DB::select('select * from assigned_services');

        return view('events.viewevents',['events'=>$events]);	
    }
}