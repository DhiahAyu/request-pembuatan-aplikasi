<?php

// app/Http/Controllers/SrsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Log;
use App\Models\Formsrs;
use App\Models\Modul;
use App\Models\Requirement;
use App\Models\FormRequest;
use Illuminate\Support\Facades\Storage;

class SrsController extends Controller
{
    public function tambahsrs($id){
        $formRequest = Formrequest::find($id);
        return view ('tambahsrs', compact('formRequest'));
    }

    
    public function  getModul(){

        try {
            $modul = Formsrs::with('moduls.requirements')->get();
            // dd($modul);
            return view('formsrs', compact('modul'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            // return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');

            dd($e->getMessage());
}
}


public function store(Request $request)
{
    try {
        // Validasi data input
        $validatedData = $request->validate([
            'modul.*.nama_modul' => 'required',
            'modul.*.requirements.*.requirement' => 'required',
            'modul.*.requirements.*.mockup' => 'file|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // Simpan data SRS
        $srs = new Formsrs([
            'request_id' => $request->input('request_id'),
        ]);

        $srs->save();

        // Simpan data Modul dan Requirement
        foreach ($validatedData['modul'] as $modulData) {
            // Simpan data Modul
            $modul = new Modul([
                'nama' => $modulData['nama_modul'],
                'srs_id' => $srs->id,
            ]);

            $modul->save();

            // Simpan data Requirement
            foreach ($modulData['requirements'] as $requirementData) {
                $requirementModel = new Requirement([
                    'requirement' => $requirementData['requirement'],
                    'modul_id' => $modul->id,
                ]);

                $fileMockup = $requirementData['mockup'];

                if ($fileMockup) {
                    $fileNameMockup = $fileMockup->getClientOriginalName();
                    $fileMockup->storeAs('public/gambarrequirement', $fileNameMockup);
                    // $requirementModel->mockup = 'gambarrequirement/' . $fileNameMockup;
                    $requirementModel->mockup = 'storage/gambarrequirement/' . $fileNameMockup;
                }

                $requirementModel->save();
            }
        }
        $formrequest = Formrequest::find($request->input('request_id'));
        $formrequest->formsfill = '3/3';
        $formrequest->save();
        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('user')->with('success', 'Data SRS berhasil disimpan.');
    } catch (\Exception $e) {
        \Log::error($e->getMessage());
        // return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
    dd($validatedData);
}
}
