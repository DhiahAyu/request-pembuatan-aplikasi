<?php

namespace App\Http\Controllers;

use App\Models\Formrequest;
use App\Models\Formcra;
use App\Models\Formsrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        $data = Formrequest::all();
        return view ('formrequest',compact('data'));
    }
    function admin(){
        $data = Formrequest::all();
        return view ('homeadmin',compact('data'));
    }
    function user(){
        $data = Formrequest::all();
        return view ('homeuser',compact('data'));
    }
    function project(){
        $data = Formsrs::all();
        // dd($data);
        return view('homeproject', compact('data'));
    }    
    function digiport(){
        $data = Formcra::all();
        return view ('homedigiport',compact('data'));
    }
    function planning(){
        $data = Formcra::all();
        return view ('homeplanning',compact('data'));
    }
}
