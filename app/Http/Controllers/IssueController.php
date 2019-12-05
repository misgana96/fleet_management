<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Issue;
use App\vehicle;

class IssueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');    
        $this->middleware('role:admin');    
    }

    //
    public function viewIssues()
    {

    	$issues = DB::table('issues')
                    ->leftjoin('vehicles','issues.vehicle','=','vehicles.vehicle_id')
                    ->orderBy('priority')
                    ->paginate(10);

        return view('issues.viewissues',['issues'=>$issues]);	
    }

    //
    public function viewIssue()
    {
        return view('issues.viewissue');	
    }

    //
    public function addIssueForm()
    {
        $vehicles = DB::table('vehicles')->select('vehicle_id','vehicle_name')->get();
        return view('issues.newissue',['vehicles'=>$vehicles]);	
    }

    //
    public function addIssueSubmit(Request $request)
    {
        $this->validate($request,[
                'vehicle' => 'required',
                'title' => 'required',
                'reported_by' => 'required',
                'priority' => 'required',
                'due_date' => 'required',
                'attached_file' => '',
                'description' => 'required',
            ]);
             

    	//return $request->all();
    	$issue = new Issue();
    	$issue->vehicle = $request->vehicle;
    	$issue->title = $request->title;
    	$issue->reported_by = $request->reported_by;
        $issue->priority = $request->priority;
        $issue->due_date = $request->due_date;
        $issue->attached_file = "sdg";
    	$issue->description = $request->description;
    	$issue->save();
    	return redirect('/issues'); 
    }
}
