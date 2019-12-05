<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller{
    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
       
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
 public function addUserForm()
    {
        return view('users.newuser');   
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'f_name' => 'required|max:255',
            'l_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'phone_no' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['sex']=='M'){
         $data['image_url']='image/ww.png';   
        }
        else{
        $data['image_url']='image/jj.png';
       }
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'phone_no' => $data['phone_no'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'address' => $data['address'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
            'image_url'=>$data['image_url']
        ]);
    }
}