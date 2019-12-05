<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\user;
use App\notification;
class NotificationController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');    
        $this->middleware('role:employee');    
    }
     public function addNotification(Request $request){
         
        //  $user = User::find(1);
          $notification = new notification();
          $notification->users_id;
     }

      public function viewaAssigned_service_notification(Request $request){
          
          
         $notification_enquiry=notification::where('notifiable_id', '=', $request->id)->first();
          if ($notification_enquiry!=null){
             $assigned_services = DB::table('assigned_services')
                    ->leftjoin('notifications','notifications.notifiable_id','=','assigned_services.user_id')
                    ->where('notifiable_id',$request->id)
                    ->get();
          }

          return view('Notification.viewnotification',
            [
                'tab'=>'assigned_services',
                'notification_enquiry' => $notification_enquiry,
                'assigned_services' => $assigned_services
            ]);  
    } 
        public function viewaFinieshed_service_notification(Request $request){
          
          
         $notification_enquiry=notification::where('notifiable_id', '=', $request->id)->first();
          if ($notification_enquiry!=null){
             $finished_services = DB::table('finished_services')
                    ->leftjoin('notifications','notifications.notifiable_id','!=','finished_services.user_id')
                    ->where('notifiable_id',$request->id)
                    ->get();
          }

          return view('Notification.viewnotification',
            [
                'tab'=>'finished_services',
                'notification_enquiry' => $notification_enquiry,
                'finished_services' => $finished_services
            ]);  
    } 

      public function notifCount($id){
          $notification = new notification();
          $notifications = DB::select('select unseen from notifications where id=1',[$id]);
          return view('Notification.notification',['notifications'=>$notifications]);


           }
           public function clearNotifications(){

          $notifications=DB::table('notifications')->delete();


           }
        public function viewNotifications(){
          $user = User::find(1);
          //$user->notifications as $notification
    // $notifications = DB::select('select data  from notifications ');


      return view('Notification.notification',['notifications'=>$user->unreadnotifications]); 
}
 

}