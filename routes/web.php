<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormrequestController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormcraController;

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
        } else {
            return redirect('/user');
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
});

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

// APPROVE & REJECT
Route::get('/formrequest/approve/{id}', [FormrequestController::class, 'approve'])->name('formrequestapprove');
Route::get('/formrequest/reject/{id}', [FormrequestController::class, 'reject'])->name('formrequestreject');

// Route::get('/requests',[FormcraController::class, 'index'])->name('requests');
Route::get('/indexMethod', [FormcraController::class, 'indexMethod'])->name('indexMethod');
Route::get('/tambahdatacra',[FormcraController::class, 'tambahdatacra'])->name('tambahdatacra');
Route::post('/insertdatacra',[FormcraController::class, 'insertdatacra'])->name('insertdatacra');

Route::post('/saveasdraftcra', [FormcraController::class, 'saveasdraftcra'])->name('saveasdraftcra');