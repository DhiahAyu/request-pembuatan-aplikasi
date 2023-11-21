<?php

// app/Http/Controllers/SrsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formsrs;
use App\Models\Modul;
use App\Models\Requirement;
use App\Models\FormRequest;

class SrsController extends Controller
{
    public function create(Request $request)
    {
        $formRequest = FormRequest::find($request->input('request_id'));

        return view('homeuser', compact('formRequest'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi data input
            $validatedData = $request->validate([
                'modul.*.nama_modul' => 'required',
                'modul.*.requirements.*.requirement' => 'required',
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

                    $requirementModel->save();
                }
            }

            // Redirect atau berikan respons sesuai kebutuhan
            return redirect()->route('srs.create')->with('success', 'Data SRS berhasil disimpan.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            // return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
        dd($validatedData);
    }
}
