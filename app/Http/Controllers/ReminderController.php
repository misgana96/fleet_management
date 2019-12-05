<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reminder;
use DB;
use auth;
use App\User;
 
 class ReminderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }


     public function viewReminders(){
    	$reminders = DB::select('select * from reminders');

        return view('Reminders.viewReminders',['reminders'=>$reminders]);	
    }


    
      public function viewIssueReminder(Request $request)
      {
        $reminder_enquiry = Reminder::where('issue_id', '=', $request->id)->first();
        if ($reminder_enquiry!=null) {
            $issues = DB::table('issues')
                    ->leftjoin('reminders','reminders.issue_id','=','issues.id')
                    ->where('issue_id',$request->id)
                    ->get();
        }

        return view('Reminders.viewReminder',
            [
                'tab'=>'issues',
                'reminder_enquiry' => $reminder_enquiry,
                'issues' => $issues,
            ]);  
    }



     public function addReminderForm(){
         $issues = DB::table('issues')->select('id','title')->get(); 
    	return view('Reminders.newReminders',['issues'=>$issues]);
    }
    public function editReminderForm(Request $request){
 
         $issues = DB::table('issues')->select('id','title')->get(); 
        return view('Reminders.newReminders',['issues'=>$issues]);
    }
     public function editReminderSubmit(Request $request){


         $this->validate($request,[
                'vehicle_name' => 'required',
                'users' => 'required',
                'due_date' => 'required|after:today',
                'issue_id' => 'required',
               ]);


        $reminder = new Reminder();
        $reminder->users = $request->users;
        $reminder->vehicle_name = $request->vehicle_name;
        $reminder->due_date = $request->due_date;
        $reminder->issue_id = $request->issue_id;
        $reminder->save();
        return redirect('/reminders'); 
    }
    
    
    public function addReminderSubmit(Request $request){


         $this->validate($request,[
                'vehicle_name' => 'required',
                'users' => 'required',
                'due_date' => 'required|after:today',
                'issue_id' => 'required',
               ]);


    	$reminder = new Reminder();
    	$reminder->users = $request->users;
    	$reminder->vehicle_name = $request->vehicle_name;
        $reminder->due_date = $request->due_date;
        $reminder->issue_id = $request->issue_id;
        $reminder->save();
        return redirect('/reminders'); 
    }
}
