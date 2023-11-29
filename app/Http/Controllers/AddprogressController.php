<?php

namespace App\Http\Controllers;

use App\Models\Formrequest;
use App\Models\Formcra;
use App\Models\Formsrs;
use Illuminate\Http\Request;

class AddprogressController extends Controller
{
    public function editprogress($id){
        $data = Formsrs::with('rfc', 'moduls.requirements')->find($id);
        return view ('addprogress', compact('data'));
    }

    public function updateProgress(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'progress' => 'required|integer|min:0|max:100', // Adjust validation rules as needed
        ]);

        // Find the requirement by ID
        $requirement = Requirement::find($id);

        if (!$requirement) {
            return redirect()->back()->with('error', 'Requirement not found.');
        }

        // Update the progress
        $requirement->progress = $request->input('progress');
        $requirement->save();

        return redirect()->back()->with('success', 'Progress updated successfully.');
    }
}