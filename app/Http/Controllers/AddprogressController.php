<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Formsrs;
use App\Models\Modul;
use App\Models\Pic;
use Illuminate\Http\Request;

class AddprogressController extends Controller
{
    public function editprogress($id)
    {
        $data = Formsrs::with('rfc', 'moduls.requirements','pic')->find($id);
        return view('addprogress', compact('data'));
        // dd($data);
        
    }

    public function updateProgress(Request $request, $id)
    {
    // Validate the form data
    $request->validate([
        'progress.*' => 'required|integer|min:0|max:100', // Adjust validation rules as needed
    ]);

    foreach ($request->input('progress') as $requirementId => $progress) {
        // Find the requirement by ID
        $requirement = Requirement::find($requirementId);

        if ($requirement) {
            // Update the progress
            $requirement->progress = $progress;
            $requirement->save();
        }
    }

    // Recalculate average progress for each modul
    $moduls = Modul::all();

    foreach ($moduls as $modul) {
        $requirements = Requirement::where('modul_id', $modul->id)->get();
        $totalProgress = 0;
        $totalRequirements = count($requirements);
    
        foreach ($requirements as $req) {
            $totalProgress += $req->progress;
        }
    
        if ($totalRequirements > 0) {
            $averageProgress = $totalProgress / $totalRequirements;
            $modul->tot_modul = $averageProgress;
            $modul->save();
        }
    }
    
    $formsrs = Formsrs::all();
    
    foreach ($formsrs as $formsrs) {
        $modulsrs = Modul::where('srs_id', $formsrs->id)->get();
        $totalProgress = 0;
        $totalModul = count($modulsrs);
    
        foreach ($modulsrs as $modul) {
            $totalProgress += $modul->tot_modul; // Gunakan $modul->tot_modul dari perhitungan sebelumnya
        }
    
        if ($totalModul > 0) {
            $averageModul = $totalProgress / $totalModul;
            $formsrs->tot_progress = $averageModul;
            $formsrs->save();
        }
    }

    return redirect()->route('project')->with('success', 'Progress updated successfully.');
}

public function tambahPic(Request $request, $id)
{
    $data = Formsrs::find($id);
    
    if($data) {
        $request->validate([
            'name_pic' => 'required|array|min:3', // Pastikan memasukkan minimal 3 nama PIC
            'name_pic.*' => 'required|string|max:255',
        ]);
        
        foreach ($request->input('name_pic') as $name) {
            Pic::create(['name_pic' => $name, 'srs_id' => $id]);
        }
        
        return redirect()->route('editprogress', ['id' => $id])->with('success', 'PIC berhasil di tambahkan');
    } else {
        // Tambahkan logika untuk penanganan kesalahan jika data tidak ditemukan
    }
}



}
