<?php

namespace App\Http\Controllers;

class ProjectpageController extends Controller
{
    public function homeproject(){
        $homeproject=Formrequest::with('formsrs')->get();
    }
}