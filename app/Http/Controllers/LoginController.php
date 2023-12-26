<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login_proses(Request $request ){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login');
        }
    }
     public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
