<?php

namespace App\Http\Controllers;

use App\Models\Formcra;
use Illuminate\Http\Request;

class FormcraController extends Controller
{
    public function indexMethod()
    {
         $data = Formcra::all();
        //  dd($data);
         return view('formcra', compact('data'));
    }

    public function tambahdatacra(){
        return view ('tambahdatacra');
    }

    public function insertdatacra(Request $request){
        // Convert array values to comma-separated strings
        $impactAreas = implode(',', $request->input('impact_areas'));
        $priority = implode(',', $request->input('priority'));
    
        // Prepare data for insertion
        $data = $request->except(['submit', '_token']);
        $data['impact_areas'] = $impactAreas;
        $data['priority'] = $priority;
    
        // Tambahkan actioncra ke dalam data
        $data['actioncra'] = $request->input('actioncra');
    
        // Tambahkan is_draft ke dalam data
        $data['actioncra'] = ($request->input('actioncra') === 'saveDraft');
    
        // Insert data
        try {
            Formcra::create($data);
        } catch (\Exception $e) {
            // Tampilkan error message
            dd($e->getMessage());
        }
        // Redirect ke halaman index dengan pesan success
        return redirect()->route('indexMethod')->with('success', 'Data berhasil ditambahkan');
    }
    
}
