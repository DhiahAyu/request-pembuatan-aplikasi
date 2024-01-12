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
    // function admin(){
    //     $data = Formrequest::paginate(3);
    //     return view ('homeadmin',compact('data'));

    // }
    public function admin()
    {
        // Calculate the counts
        $data = Formrequest::paginate(10);
        $totalData = Formrequest::whereIn('status', ['Pending', 'Approved', 'Rejected'])->count();
        $totalApproved = Formrequest::where('status', 'Approved')->count();
        $totalRejected = Formrequest::where('status', 'Rejected')->count();
        $totalPending = Formrequest::where('status', 'Pending')->count();

        // Pass the counts to the view
        return view('homeadmin', compact('data', 'totalData', 'totalApproved', 'totalRejected', 'totalPending'));
    }
    function user(){
        $data = Formrequest::paginate(10);
        // $data = Formrequest::all();
        return view ('homeuser',compact('data'));
    }
    function project(){
        $data = Formsrs::paginate(10);
        // dd($data);
        return view('homeproject', compact('data'));
    }    
    function digiport(){
        $data = Formrequest::paginate(10);
        return view ('homedigiport',compact('data'));
    }
    function planning(){
        $data = Formcra::paginate(10);
        return view ('homeplanning',compact('data'));
    }

    // public function search(Request $request){
    //     if($request)->has('search'){
    //       $admin  =  Admin::where('')
    //     }
    // }
}
