<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:employee');
    }

    //
    public function editUserForm(Request $request)
    {
        $user = DB::table('users')->where('id','=',Auth::user()->id)->get();
        return view('users.newuser',['user' => $user]); 
    }
    //
    public function editUserSubmit(Request $request)
    {
        $this->validate($request,[
                'f_name' => 'bail|required|max:50',
                'l_name' => 'bail|required|max:50',
                'email' => 'required',
                'phone_no' => 'required',
                'sex' => 'required',
                'address' => 'required',
                'password' => 'required',
            ]);

        $user = User::where('id',Auth::user()->id)->first();

        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->emali;
        $user->phone_no = $request->phone_no;
        $user->sex= $request->sex;
        $user->address = $request->address;
        $user->password= $request->password;
        $user->save();
        return redirect('/users'); 
    }
}
