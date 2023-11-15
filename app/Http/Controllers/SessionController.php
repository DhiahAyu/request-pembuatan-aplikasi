<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('login');
    }
    function login (Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role =='admin'){
                return redirect('/admin');
            }else if(Auth::user()->role =='user'){
                return redirect('/user');
            }else if(Auth::user()->role =='project'){
                return redirect('/project');
            }else if(Auth::user()->role =='digiport'){
                return redirect('/digiport');
            }else{
                return redirect('/planning');
            }
            // return redirect('/admin');
        }else{
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
