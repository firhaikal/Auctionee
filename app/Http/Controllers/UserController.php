<?php

namespace App\Http\Controllers;
use App\ModelUser;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
        
        public function index(){
            if(!Session::get('log-in')){
                return redirect('log-in')->with('alert','You have to log in');
            }
            else{
                return view('home');
            }
        }
    
        public function login(){
            return view('auth.login');
        }
    
        public function loginPost(Request $request){
    
            $username = $request->username;
            $password = $request->password;
    
            $data = ModelUser::where('username',$username)->first();
            if($data){ //apakah username tersebut ada atau tidak
                if(Hash::check($password,$data->password)){
                    Session::put('nama_lengkap',$data->nama_lengkap);
                    Session::put('username',$data->username);
                    Session::put('login',TRUE);
                    return redirect('home');
                }
                else{
                    return redirect('log-in')->with('alert','Wrong Password or Username');
                }
            }
            else{
                return redirect('log-in')->with('alert','Wrong Password or Username');
            }
        }
    
        public function logout(){
            Session::flush();
            return redirect('log-in')->with('alert','You have logged out');
        }
    
        public function register(Request $request){
            return view('auth.register');
        }
    
        public function registerPost(Request $request){
            $this->validate($request, [
                'nama_lengkap' => 'required',
                'username' => 'required',
                'password' => 'required',
                'telp' => 'required',
            ]);
    
            $data =  new ModelUser();
            $data->id_user = $request->id_user;
            $data->nama_lengkap = $request->nama_lengkap;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->telp = $request->telp;
            $data->save();
            return redirect('log-in')->with('alert-success','Registered Successfully');
        }
    
}
