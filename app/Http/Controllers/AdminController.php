<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Hash;
class AdminController extends Controller{
    //
public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');   
    }
    public function viewAdmins(){
        $users = DB::select('select * from users');
        return view('users.viewadmins',['users'=>$users]);   
    }
        public function viewUsers(){
        $users = User::paginate(10);
        return view('users.viewUsers',['users'=>$users]);   
    }
    public function editAdminForm(Request $request)
    {
        $user = DB::table('users')->where('id','=',Auth::user()->id)->get();
        return view('users.newadmin',['user' => $user]); 
    }
    //
    public function editAdminSubmit(Request $request){
        $this->validate($request,[
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'image_url'=> 'required',
                'password' => 'required|confirmed',
            ]);
        $user = User::where('id',Auth::user()->id)->first();
        $pass = Hash::make($request->password);
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->sex= $request->sex;
        $user->address = $request->address;
        $user->password= $pass;
        $target_path="image/";
        $target_path=$target_path.basename($_FILES['image_url']['name']);
        move_uploaded_file($_FILES['image_url']['tmp_name'], $target_path);
        $user->image_url=$target_path;
        $user->save();
        return redirect('/admins'); 
    }
        public function editUserForm(Request $request)
    {
        $user = DB::table('users')->where('id','=',$request->id)->get();
        return view('users.newuser',['user' => $user]); 
    }
    //
    public function editUserSubmit(Request $request)
    {
        $this->validate($request,[
                'f_name' => 'required',
                'l_name' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'password' => 'required|confirmed',
                'image_url' => 'required',
            ]);
        $user = User::where('id',Auth::user()->id)->first();
        $pass = Hash::make($request->password);
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->sex= $request->sex;
        $user->address = $request->address;
        $user->password= $pass;
        $target_path="image/";
        $target_path=$target_path.basename($_FILES['image_url']['name']);
        move_uploaded_file($_FILES['image_url']['tmp_name'], $target_path);
        $user->image_url=$target_path;
        $user->save();
        return redirect('/users'); 
    }
    public function deleteUserForm(Request $request){
      DB::table('users')->where('id', '=', $request->id)->delete();
        return redirect('/users'); 
    }
}
