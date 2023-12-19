<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Log;
use App\Models\Formsrs;
use App\Models\Modul;
use App\Models\Requirement;
use App\Models\Formrequest;
use App\Models\FormUAT;
use App\Models\UAT;
use App\Models\UAL;
use App\Models\CatatanTesting;

class UatController extends Controller
{
    public function viewuta($id) {
        $formrequest = Formsrs::with('rfc', 'moduls.requirements')->where('request_id', $id)->first();
        return view('form_uat', compact('formrequest'));
    }    

    public function insertData(Request $request)
    {
        // var_dump($_POST);exit();
        $request->validate([
            // Tambahkan aturan validasi jika diperlukan
        ]);

        // Simpan data ke dalam database
        $formuat = Formuat::create([
            'request_id' => $request->input('request_id'),
            'versi' => $request->input('textVersi'),
            'dibuat_oleh' => $request->input('textPembuat'),
            'disetujui_oleh' => $request->input('textDisetujuioleh'),
            'tanggal_persetujuan' => $request->input('textTanggalPersetujuan'),
            'keterangan' => $request->input('txareaKeterangan'),
            'jumlahtc' => $request->input('textJmlTest'),
            'jumlahtcberhasil' => $request->input('textTestBerhasil'),
            'jumlahtcerror' => $request->input('textTestError'),
            'namapjp' => $request->input('namaPenanggungJawab'),
            'jabatanpjp' => $request->input('jabatanPenanggungJawab'),
            'namakte' => $request->input('namaKetuaEvaluasi'),
            'jabatankte' => $request->input('jabatanKetuaEvaluasi'),
            'namasp' => $request->input('namaSP'),
            'jabatansp' => $request->input('jabatanSP'),
            'namaba' => $request->input('namaBA'),
            'jabatanba' => $request->input('jabatanBA'),
            'namapc' => $request->input('namaPC'),
            'jabatanpc' => $request->input('jabatanPC'),
            'namaprogrammer' => $request->input('namaProgrammer'),
            'jabatanprogrammer' => $request->input('jabatanProgrammer'),
            'namatester' => $request->input('namaTester'),
            'jabatantester' => $request->input('jabatanTester'),
            'ttdpjp' => $this->storeFileAndGetPath($request->file('customFilePJP')),
            'ttdkte' => $this->storeFileAndGetPath($request->file('customFileKTE')),
            'ttdsp' => $this->storeFileAndGetPath($request->file('customFileSP')),
            'ttdba' => $this->storeFileAndGetPath($request->file('customFileBA')),
        ]);

        // Simpan UAT
        foreach ($request->input('txareaSkenario') as $key => $skenario) {
            $uat = new UAT([
                'formuat_id' => $formuat->id,
                'na' => $request->input('textNA')[$key],
                'tahapan_scenario' => $skenario,
                'test_result' => $request->input('testresult')[$key],
                // 'test_result' => implode(',', $request->input('testresult')[$key]),
                // 'test_result' => isset($request->input('testresult')[$key]) ? $request->input('testresult')[$key] : null,
                // 'test_result' => isset($request->input('testresult')[$key]) ? $request->input('testresult')[$key] : null,
                'tester' => $request->input('txareaTester')[$key],
            ]);

            // Simpan file signature
            $signatureFile = $request->file('customFileUAT')[$key];
            if ($signatureFile) {
                $fileName = $signatureFile->getClientOriginalName();
                $signatureFile->storeAs('public/signatures', $fileName);
                $uat->signature = 'storage/signatures/' . $fileName;
            }

            $uat->save();
        }

        // Simpan UAL
        foreach ($request->input('txareaSkenarioUAL') as $key => $skenarioual) {
            $ual = new UAL([
                'formuat_id' => $formuat->id,
                'tahapan_scenario' => $skenarioual,
                'test_result' => $request->input('testresultUAL')[$key],
                // 'test_result' => implode(',', $request->input('testresultUAL')[$key]),
                // 'test_result' => isset($request->input('testresultUAL')[$key]) ? $request->input('testresult')[$key] : null,
                // 'test_result' => isset($request->input('testresultUAL')[$key]) ? $request->input('testresultUAL')[$key] : null,
                'tester' => $request->input('txareaTesterUAL')[$key],
            ]);

            // Simpan file signature UAL
            $signatureFile = $request->file('customFileUAL')[$key];
            if ($signatureFile) {
                $fileName = $signatureFile->getClientOriginalName();
                $signatureFile->storeAs('public/signatures', $fileName);
                $ual->signature = 'storage/signatures/' . $fileName;
            }

            $ual->save();
        }

        //Catatan Testing
        foreach ($request->input('textCatatan') as $key => $catatan) {
        CatatanTesting::create([
            'formuat_id' => $formuat->id,
            'catatan' => $catatan,
            'user' => $request->input('textUser')[$key],
        ]);
    }
        // return redirect()->route('user')->with('success', 'Form UAT Berhasil Dikirim');
        dd($request->all());
    }
    
    private function storeFileAndGetPath($file)
    {
        if ($file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/signatures', $fileName);
            return 'storage/signatures/' . $fileName;
        }

        return null;
    }
}