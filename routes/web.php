<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormrequestController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\FormcraController;
use App\Http\Controllers\FormsrsController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\SrsController;
use App\Http\Controllers\UatController;
use App\Http\Controllers\AddprogressController;
use App\Models\Formsrs;
use App\Http\Controllers\QualitycontrolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest'])->group(function(){
    Route::get('/',[SessionController::class,'index'])->name('login');
    Route::post('/',[SessionController::class,'login']);
});

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }else if (Auth::user()->role == 'user') {
            return redirect('/user');
        }else if (Auth::user()->role == 'project') {
            return redirect('/project');
        }else if (Auth::user()->role == 'digiport') {
            return redirect('/digiport');
        } else {
            return redirect('/planning');
        }
    } else {
        return redirect('');
    }
})->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[SessionController::class,'logout']);
    Route::get('/admin',[AdminController::class,'index']); 
    Route::get('/admin',[AdminController::class,'admin'])->middleware('userAccess:admin')->name('admin'); 
    Route::get('/user',[AdminController::class,'user'])->middleware('userAccess:user')->name('user'); 
    Route::get('/project',[AdminController::class,'project'])->middleware('userAccess:project')->name('project');
    Route::get('/digiport',[AdminController::class,'digiport'])->middleware('userAccess:digiport')->name('digiport');
    Route::get('/planning',[AdminController::class,'planning'])->middleware('userAccess:planning')->name('planning');   
});

//----------CRA-----------
Route::get('/viewcra/{id}',[FormcraController::class, 'viewcra'])->name('viewcra');


//HALAMAN FORM CRA
Route::get('/tambahrca',[FormrequestController::class, 'tambahchangerequest'])->name('tambahrca');

//HALAMAN CRUD FORM REQUEST
Route::get('/request',[FormrequestController::class, 'index'])->name('request');

//HALAMAN FORM REQUEST
Route::get('/tambahrequest',[FormrequestController::class, 'tambahrequest'])->name('tambahrequest');

//INSERT DATA
// Route::post('/insertdata',[FormrequestController::class, 'insertdata'])->name('insertdata');
Route::post('/insertdata', [FormrequestController::class, 'insertdata'])->name('insertdata');

//SAVE AS DRAFT
Route::post('/saveasdraft', [FormrequestController::class, 'saveasdraft'])->name('saveasdraft');

//HALAMAN EDIT/UPDATE
Route::get('/updaterequest/{id}',[FormrequestController::class, 'updaterequest'])->name('updaterequest');

//UPDATE DATA
Route::post('/updatedata/{id}',[FormrequestController::class, 'updatedata'])->name('updatedata');

//DELETE DATA
Route::get('/deletedata/{id}',[FormrequestController::class, 'deletedata'])->name('deletedata');

// //HALAMAN FORM CHANGE REQUEST
// Route::get('/tambahchangerequest',[FormrequestController::class, 'tambahchangerequest'])->name('tambahchangerequest');


//DOWNLOAD PDF
Route::get('/download_pdf/{id}',[FormrequestController::class, 'downloadPdf'])->name('downloadPdf');

// Route::post('/send-rejected-message',[FormrequestController::class, 'sendRejectedMessage'])->name('rejectedMessage');
Route::post('/pesanreject/{id}', [FormrequestController::class, 'pesanreject'])->name('pesanreject');



// APPROVE & REJECT
Route::get('/formrequest/approve/{id}', [FormrequestController::class, 'approve'])->name('formrequestapprove');
Route::post('/formrequest/reject/{id}', [FormrequestController::class, 'reject'])->name('formrequestreject');

// Route::get('/requests',[FormcraController::class, 'index'])->name('requests');
Route::get('/indexMethod', [FormcraController::class, 'indexMethod'])->name('indexMethod');
Route::get('/tambahdatacra/{id}',[FormcraController::class, 'tambahdatacra'])->name('tambahdatacra');
Route::post('/insertdatacra',[FormcraController::class, 'insertdatacra'])->name('insertdatacra');

Route::post('/saveasdraftcra', [FormcraController::class, 'saveasdraftcra'])->name('saveasdraftcra');

//----------SRS-----------
// Route::get('/srs', function () {
//     return view('srs');
// });

// Route::get('/indexMethod', [FormcraController::class, 'indexMethod'])->name('indexMethod');
// Route::get('/tambahdatacra',[FormcraController::class, 'tambahdatacra'])->name('tambahdatacra');
// Route::post('/insertdatacra',[FormcraController::class, 'insertdatacra'])->name('insertdatacra');

Route::resource('srsadd', Formsrs::class);

// Route::resource('srsadd', Formsrs::class);

// Route::get('/indexsrs', [FormsrsController::class, 'indexsrs'])->name('indexsrs');
Route::get('/tambahsrs/{id}',[SrsController::class, 'tambahsrs'])->name('tambahsrs');
// Route::post('/insertdatasrs',[FormsrsController::class, 'insertdatasrs'])->name('insertdatasrs');

//-----------SRS--------//
Route::post('/modul/store', [SrsController::class, 'store'])->name('modul.store');

// Route::get('/getdata-modul', [SrsController::class, 'getModul']);

Route::get('/formsrs', [SrsController::class, 'getModul']);
// Route::get('/gambarrequirement/{fileMockup}', [SrsController::class, 'getModul'])->name('formsrs');

Route::get('gambarrequirement/{filename}', function ($filename) {
    $path = public_path('gambarrequirement/' . $filename);

    // Jika file tidak ditemukan, kirim response 404
    if (!file_exists($path)) {
        abort(404);
    }

    // Baca file dan kirimkan sebagai response dengan tipe konten yang sesuai
    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('gambarrequirement');


// ==========Progress==========
Route::get('/editprogress/{id}',[AddprogressController::class, 'editprogress'])->name('editprogress');
Route::post('/update-progress/{id}', [AddprogressController::class, 'updateProgress'])->name('update.progress');

// Route::get('/QC/{id}', function (){
//     return view('tambahqc');
// });

Route::get('/QC/{id}', [QualitycontrolController::class, 'indexQC'])->name('indeQC');

Route::post('/insertqc', [QualitycontrolController::class, 'insertqc'])->name('insertqc');

Route::get('/tambahdataqc',[QualitycontrolController::class, 'tambahdataqc'])->name('tambahdataqc');

//=========FormUAT========
Route::get('/UAT', function () {
    return view('form_uat');
});

Route::get('/UAT/{id}',[UatController::class, 'viewuta'])->name('viewuta');
Route::post('/insertdatauat', [UatController::class, 'insertData']);
