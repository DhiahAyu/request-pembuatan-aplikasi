<?php

namespace App\Http\Controllers;

use App\Models\Formrequest;
use App\Models\Formcra;
use App\Models\FlowchartImage;
use App\Models\UploaddataImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDF;

class FormrequestController extends Controller
{
    //HALAMAN CRUD FORM REQUEST
    public function index(){
        $data = Formrequest::all();
        return view ('formrequest',compact('data'));
    }

    //HALAMAN HOME USER
    public function homeuser(){
        $data = Formrequest::all();
        return view ('homeuser',compact('data'));
    }

    //HALAMAN HOME ADMIN
    public function homeadmin() {
        $data = Formrequest::whereIn('status', ['Pending', 'Approved', 'Rejected'])
            ->with('formcra') // Memuat relasi Formcra
            ->get();
        $cra = Formcra::all();
        return view('homeadmin', compact('data', 'cra'));
    }


    //HALAMAN FORM REQUEST
    public function tambahrequest(){
        return view ('tambahrequest');
    }

    //INSERT DATA
    public function insertdata(Request $request){

        if ($request->input('action') === 'submit') {
            $request->validate([
                'nama_aplikasi'=>'required',
                'sponsor_proyek'=>'required',
                'latar_belakang'=>'required',
                'tujuan'=>'required',
                'wanted_feature'=>'required',
                'current_condition'=>'required',
                'kendala'=>'required',
                'ruang_lingkup'=>'required',
            ],[
                'nama_aplikasi.required'=>'Nama Aplikasi wajib diisi',
                'sponsor_proyek.required'=>'Sponsor Proyek wajib diisi',
                'latar_belakang.required'=>'Latar Belakang wajib diisi',
                'tujuan.required'=>'Tujuan wajib diisi',
                'current_condition.required'=>'Kondisi saat ini wajib diisi',
                'kendala.required'=>'Kendala wajib diisi',
                'ruang_lingkup.required'=>'Ruang lingkup wajib diisi',
            ]);

            $data = Formrequest::create($request->all());
            $data->status = 'Pending'; // Set status menjadi "Pending"
            $data->formsfill = '1/3';
            $data->save();

            if ($request->hasFile('flowchart') && $request->hasFile('uploaddata')) {
                foreach ($request->file('flowchart') as $flowchartFile) {
                    $flowchartFileName = $flowchartFile->getClientOriginalName();
                    $flowchartFile->storeAs('public/gambarflowchart/', $flowchartFileName);

                    $flowchartimage = new FlowchartImage([
                        'flowchart' => 'storage/gambarflowchart/' . $flowchartFileName,
                        'request_id' => $data->id,
                    ]);
                    $flowchartimage->save();
                }

                foreach ($request->file('uploaddata') as $uploadDataFile) {
                    $uploadDataFileName = $uploadDataFile->getClientOriginalName();
                    $uploadDataFile->storeAs('public/gambarflowchart/', $uploadDataFileName);

                    $uploaddataimage = new UploaddataImage([
                        'uploaddata' => 'storage/gambarflowchart/' . $uploadDataFileName,
                        'request_id' => $data->id,
                    ]);
                    $uploaddataimage->save();
                }

                $data->save();
            }

        } elseif ($request->input('action') === 'saveDraft') {
            $data = Formrequest::create($request->all());

            if ($request->hasFile('flowchart')) {
                $flowchartFile = $request->file('flowchart');
                $flowchartFileName = $flowchartFile->getClientOriginalName();
                $flowchartFile->storeAs('public/gambarflowchart/', $flowchartFileName);
                $data->flowchart = 'storage/gambarflowchart/' . $flowchartFileName;
            }
            
            if ($request->hasFile('uploaddata')) {
                $uploadDataFile = $request->file('uploaddata');
                $uploadDataFileName = $uploadDataFile->getClientOriginalName();
                $uploadDataFile->storeAs('public/gambarflowchart/', $uploadDataFileName);
                $data->uploaddata = 'storage/gambarflowchart/' . $uploadDataFileName;
            }
            
            $data->save();
            
        }
        //dd($request->all());
        return redirect()-> route('user')->with('success','Data Berhasil Di Tambahkan');
    }


    //HALAMAN UPDATE DATA REQUEST
    public function updaterequest($id){
        $data= Formrequest::find($id);
        //dd($data);

        return view('updaterequest',compact('data'));
    }

    //UPDATE DATA
    public function updatedata(Request $request, $id){
        $data= Formrequest::find($id);
        $data->update($request->all());
        if($request->hasFile('flowchart')){
            $request->file('flowchart')->move('gambarflowchart/', $request->file('flowchart')->getClientOriginalName());
            $data->flowchart = $request->file('flowchart')->getClientOriginalName();
            $data->save();
        }
        return redirect()-> route('user')->with('success','Data Berhasil Di Update');
    }

    //DELETE DATA
    public function deletedata($id){
        $data= Formrequest::find($id);
        $data->delete();
        return redirect()-> route('user')->with('success','Data Berhasil Di Hapus');
    }

    //HALAMAN FORM CHAGE REQUEST
    public function tambahchangerequest(){
        return view ('tambahformrequestchange');
    }

    //Download PDF

    public function downloadPdf(Request $request, $id){
        $formrequest = Formrequest::find($id);

        if (!$formrequest) {
            return redirect()->route('request')->with('error', 'Data not found');
        }

        // Retrieve the image data from the database
        $imageData = File::get('gambarflowchart/' . $formrequest->flowchart);

        // Get the original filename
        $originalFileName = $formrequest->flowchart;

        $data = [
            'formrequest' => $formrequest,
            'imageData' => $imageData,
            'originalFileName' => $originalFileName,
        ];

        // Load a view for PDF generation (you'll need to create this view)
        // Replace 'pdf.formrequest' with the actual name of your PDF view
        $pdf = PDF::loadView('pdf.formrequest', $data)->setOptions(['defaultFont' => 'sans-serif']);

        // Generate the PDF
        return $pdf->stream('Form Request Pembuatan Aplikasi.pdf');
        // return $pdf->download('formrequest.pdf');
        
    }

    // APPROVE
        public function approve($id){
            $data = Formrequest::find($id);
            if($data) {
                $data->status = 'Approved'; // Gantikan dengan nama status yang sesuai
                $data->save();
                return redirect()->route('admin')->with('success', 'Data Berhasil Di Approve');
            } else {
                return redirect()->route('admin')->with('error', 'Data Tidak Ditemukan');
            }
        }

    // REJECT
        public function reject(Request $request, $id){
            $data = Formrequest::find($id);
            if($data) {
                $request->validate([
                    'rejected_message' => 'required|string',
                ]);
                $data->pesan = $request->rejected_message;
                $data->status = 'Rejected'; // Gantikan dengan nama status yang sesuai
                $data->save();
                // dd($data);
                return redirect()->route('admin')->with('success', 'Data Berhasil Di Reject');
            } else {
                return redirect()->route('admin')->with('error', 'Data Tidak Ditemukan');
            }
        }

    //SAVE AS DRAFT
    public function saveasdraft(Request $request){
        
        return redirect()-> route('user')->with('success','Data Berhasil Di Tambahkan');
    }
}
