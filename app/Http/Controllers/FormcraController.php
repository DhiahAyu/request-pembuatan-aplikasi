<?php

namespace App\Http\Controllers;

use App\Models\Formcra;
use App\Models\Formrequest;
use App\Models\ChangeMajor;
use App\Models\ChangeMinor;
use Illuminate\Http\Request;

class FormcraController extends Controller
{
    public function indexMethod()
    {
         $data = Formcra::all();
        //  dd($data);
         return view('formcra', compact('data'));
    }

    public function tambahdatacra($id){
        $formRequest = Formrequest::find($id);
        return view ('tambahdatacra', compact('formRequest'));
    }

    public function insertdatacra(Request $request){
        $impactAreas = implode(' , ', $request->input('impact_areas'));
        $priority = implode(' , ', $request->input('priority'));

        $data['request_id'] = $request->input('request_id');
    
        $data = $request->except(['submit', '_token']);
        $data['impact_areas'] = $impactAreas;
        $data['priority'] = $priority;
    
        $data['actioncra'] = $request->input('actioncra');
        $data['actioncra'] = ($request->input('actioncra') === 'saveDraft');
    
        try {
            $formcra = Formcra::create($data);
            $formrequest = Formrequest::find($request->input('request_id'));
            $formrequest->formsfill = '2/3';
            $formrequest->save();
    
            foreach ($request->input('justification_major') as $justificationMajor) {
                $major = new ChangeMajor([
                    'justification' => $justificationMajor,
                    'cra_id' => $formcra->id,
                ]);
                $major->save();
            }
    
            foreach ($request->input('justification_minor') as $justificationMinor) {
                $minor = new ChangeMinor([
                    'justification' => $justificationMinor,
                    'cra_id' => $formcra->id, 
                ]);
                $minor->save();
            }
            
        } catch (\Exception $e) {
            dd($e->getMessage());
            // dd($formcra);
        }

         return redirect()->route('admin')->with('success', 'Data Berhasil Ditambahkan');
        // return redirect()->route('indexMethod')->with('success', 'Data berhasil ditambahkan');
        return redirect()->route('admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function viewcra($id){
        $data = Formcra::find($id);
        $selectedImpactAreas = explode(' , ', $data->impact_areas);
        $selectedPriority = explode(' , ', $data->priority);
    
        return view('form_cra_readonly', compact('data', 'selectedImpactAreas', 'selectedPriority'));
    }
}