<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $userData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4'
        ]);

        $user = User::create($userData);
        if($user){
            return redirect('login');
        }
    }
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:16'
        ]);

        if(Auth::attempt($loginData)){
            return redirect('dashboard');
        }
        else{
            return redirect()->back()->with("error","Invalid credentials");
        }


    }
    public function dashboard(){
        // if(Auth::check()){

            return view('dashboard');
        // }
        // return redirect('login')->with('error',"login first");
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function category(){

            return view('category');

    }
}
