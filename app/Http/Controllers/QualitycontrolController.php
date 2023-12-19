<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualitycontrol;
use App\Models\Formsrs;
use App\Models\Pengujian;
use App\Models\Penginfrastruktur;

class QualitycontrolController extends Controller
{
    public function indexQC($id) {
        $formrequest = Formsrs::with('rfc', 'moduls.requirements')->where('request_id', $id)->first();
        // dd($formrequest);
        return view('tambahqc', compact('formrequest'));
    }

    public function tambahdataqc(){
        return view ('tambahqc');
    }

    public function insertqc(Request $request)
    {
        $request->validate([
        ]);

        $qualityControl = Qualitycontrol::create([
            'srs_id' => $request->input('srs_id'),
            'versi' => $request->input('versi'),
            'dibuat' => $request->input('dibuat'),
            'tglrevisi' => $request->input('tglrevisi'),
            'disetujui' => $request->input('disetujui'),
            'tglpersetujuan' => $request->input('tglpersetujuan'),
            'keterangan' => $request->input('keterangan'),
            'namaapp' => $request->input('namaapp'),
            'versiapp' => $request->input('versiapp'),
            'releaseapp' => $request->input('releaseapp'),
            'tglpengujian' => $request->input('tglpengujian'),
            'idcase' => $request->input('idcase'),
            'jumlahcase' => $request->input('jumlahcase'),
            'caseberhasil' => $request->input('caseberhasil'),
            'caseeror' => $request->input('caseeror'),
            'namatimevaluasi' => $request->input('namatimevaluasi'),
            'namaqc' => $request->input('namaqc'),
            'jabatanprogrammer' => $request->input('jabatanProgrammer'),
            'ttdtimevaluasi' => $this->storeFileAndGetPath($request->file('ttdtimevaluasi')),
            'ttdtimqc' => $this->storeFileAndGetPath($request->file('ttdtimqc')),
            'namapc' => $request->input('namapc'),
            'namaqcc' => $request->input('namaqcc'),
        ]);

        // foreach ($request->input('catatan') as $key => $cat) {
        //            $peng = new Pengujian([
        //                     'qc_id' => $qualityControl->id,
        //                     'test_result' => isset($request->input('test_result')[$key]) ? $request->input('pass')[$key] : null,
        //                     'catatan' => $request->input('catatan')[$key],
        //                 ]);
        //                 $peng->save();
        //             }  
        
        $catatanArray = $request->input('catatan', []);
        $testResultArray = $request->input('test_result', []);

        foreach ($catatanArray as $key => $cat) {
            $testResult = isset($testResultArray[$key]) ? $testResultArray[$key] : null;

            $peng = new Pengujian([
                'qc_id' => $qualityControl->id,
                'test_result' => $testResult,
                'catatan' => $cat,
            ]);

            $peng->save();
        }

            
            
            // foreach ($request->input('catatann') as $catt) {
            //     $major = new Penginfrastruktur([
            //         'qc_id' => $qualityControl->id,
            //         'nomor' =>$request->input('nomor'),
            //         'aspekinfrastruktur' =>$request->input('aspekinfrastruktur'),
            //         'hasiltes' =>$request->input('hasiltes'),
            //         'catatann' =>$request->input('catatann'),
            //     ]);
            //     $major->save();
            //     // dd($request->all());
            // }

            // foreach ($request->input('catatann') as $key => $catt) {
            //     for ($i = 0; $i < count($request->input('catatann')); $i++) {
            //     Penginfrastruktur::create([
            //         'nomor' => isset($request->input('nomor')[$key]) ? $request->input('nomor')[$key] : null,
            //         'aspekinfrastruktur' => isset($request->input('aspekinfrastruktur')[$key]) ? $request->input('aspekinfrastruktur')[$key] : null,
            //         'hasiltes' => isset($request->input('hasiltes')[$key]) ? $request->input('hasiltes')[$key] : null, 
            //         'catatann' => $request->input('catatann')[$i],
            //         'qc_id' => $qualityControl->id,
            //     ]);}
            // }

            $catatannArray = $request->input('catatann') ?? [];
            $nomorArray = $request->input('nomor') ?? [];
            $aspekinfrastrukturArray = $request->input('aspekinfrastruktur') ?? [];
            $hasiltesArray = $request->input('hasiltes') ?? [];

            for ($i = 0; $i < count($catatannArray); $i++) {
                Penginfrastruktur::create([
                    'nomor' => isset($nomorArray[$i]) ? $nomorArray[$i] : null,
                    'aspekinfrastruktur' => isset($aspekinfrastrukturArray[$i]) ? $aspekinfrastrukturArray[$i] : null,
                    'hasiltes' => isset($hasiltesArray[$i]) ? $hasiltesArray[$i] : null, 
                    'catatann' => isset($catatannArray[$i]) ? $catatannArray[$i] : null,
                    'qc_id' => $qualityControl->id,
                ]);
            }
            
            return redirect()->route('admin')->with('success', 'Data Berhasil Ditambahkan');
            // return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
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
                
    public function index()
    {
        $qualityControls = Qualitycontrol::all();

        return view('qualitycontrols.index', compact('qualityControls'));
    }
}