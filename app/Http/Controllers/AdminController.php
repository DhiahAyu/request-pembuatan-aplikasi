<?php

namespace App\Http\Controllers;

use App\Models\Formrequest;
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
}
