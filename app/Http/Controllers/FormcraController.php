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


    // public function insertdatacra(Request $request){
    //     $data = $request->except(['submit', '_token']);
    
    //     // Insert data
    //     try {
    //         Formcra::create($data);
    //     } catch (\Exception $e) {
    //         // Tampilkan error message
    //         dd($e->getMessage());
    //     }
    //     // Redirect ke halaman index dengan pesan success
    //     return redirect()->route('indexMethod')->with('success', 'Data berhasil ditambahkan');
    // }

    // public function insertdatacra(Request $request){
    //     // Convert array values to comma-separated strings
    //     $impactAreas = implode(',', $request->input('impact_areas'));
    //     $priority = implode(',', $request->input('priority'));
    
    //     // Prepare data for insertion
    //     $data = $request->except(['submit', '_token']);
    //     $data['impact_areas'] = $impactAreas;
    //     $data['priority'] = $priority;
    
    //     // Tambahkan actioncra ke dalam data
    //     $data['actioncra'] = $request->input('actioncra');
    
    //     // Insert data
    //     try {
    //         Formcra::create($data);
    //     } catch (\Exception $e) {
    //         // Tampilkan error message
    //         dd($e->getMessage());
    //     }
    //     // Redirect ke halaman index dengan pesan success
    //     return redirect()->route('indexMethod')->with('success', 'Data berhasil ditambahkan');
    // }


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
    
    
    // public function insertdatacra(Request $request){
    //     $request->validate([
    //         'cr_analyst'=>'required',
    //         'originator_name'=>'required',
    //         'data_owner'=>'required',
    //         'date'=>'required',
    //         'project_name'=>'required',
    //         'impact_areas'=>'required|array',
    //         'priority'=>'required|array',
    //         'justifcation_major'=>'required',
    //         'justifcation_minor'=>'required',
    //         'general_context'=>'required',
    //         'pontential_cost'=>'required',
    //         'alternative_solutions'=>'required',
    //         'support'=>'required',
    //         'infrastructure'=>'required',
    //         'additional'=>'required',
    //     ],[
    //         'cr_analyst.required'=>'Wajib diisi',
    //         'originator_name'=>'Wajib diisi',
    //         'data_owner.required'=>'Wajib diisi',
    //         'date.required'=>'Wajib diisi',
    //         'project_name.required'=>'Wajib diisi',
    //         'impact_areas.required'=>'Wajib diisi',
    //         'priority.required'=>'Wajib diisi',
    //         'justifcation_major.required'=>'Wajib diisi',
    //         'justifcation_minor.required'=>'Wajib diisi',
    //         'general_context.required'=>'Wajib diisi',
    //         'pontential_cost.required'=>'Wajib diisi',
    //         'alternative_solutions.required'=>'Wajib diisi',
    //         'support.required'=>'Wajib diisi',
    //         'infrastructure.required'=>'Wajib diisi',
    //         'additional.required'=>'Wajib diisi',
    //     ]);
    
    //     // encode array menjadi string JSON
    //     $impact_areas = json_encode($request->input('impact_areas'));
    //     $priority = json_encode($request->input('priority'));
    
    //     $data = [
    //         'cr_analyst' => $request->input('cr_analyst'),
    //         'originator_name' => $request->input('originator_name'),
    //         'data_owner' => $request->input('data_owner'),
    //         'date' => $request->input('date'),
    //         'project_name' => $request->input('project_name'),
    //         'impact_areas' => $impact_areas,
    //         'priority' => $priority,
    //         'justifcation_major' => $request->input('justifcation_major'),
    //         'justifcation_minor' => $request->input('justifcation_minor'),
    //         'general_context' => $request->input('general_context'),
    //         'pontential_cost' => $request->input('pontential_cost'),
    //         'alternative_solutions' => $request->input('alternative_solutions'),
    //         'support' => $request->input('support'),
    //         'infrastructure' => $request->input('infrastructure'),
    //         'additional' => $request->input('additional'),
    //     ];
    
    //     if ($request->input('actioncra') === 'submit' || $request->input('actioncra') === 'saveDraft') {
    //         $formcra = Formcra::create($data);
    //         $formcra->save();
    //     }
    
    //     return redirect()->route('admin')->with('success','Data Berhasil Di Tambahkan');
    // }
    
    
}
