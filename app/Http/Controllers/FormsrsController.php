<?php

namespace App\Http\Controllers;

use App\Models\Formsrs;
use Illuminate\Http\Request;

class FormsrsController extends Controller
{
    public function indexsrs()
    {
         $data = Formsrs::all();
        //  dd($data);
         return view('formcra', compact('data'));
    }

    public function tambahsrs(){
        return view ('tambahsrs');
    }

    // public function insertdatasrs(Request $request){
        
         
    //     foreach ($request->requirement as $key => $value){

    //         Formsrs::create([
    //             "nama_modul" => $request->input("nama_modul"),
    //             "requirement" => $request->input("requirement")[$key]
    //         ]);
    //     }
    // }

    public function insertdatasrs(Request $request) {
        // dd($_POST[]);
        // var_dump($_POST['requirement']);
        // exit();       
        $nama_modul = $request->input("nama_modul");
        foreach ($request->requirement as $requirement) {
            Formsrs::create([
                "nama_modul" => $nama_modul,
                "requirement" => $requirement
            ]);
        }
    }
    
    }
