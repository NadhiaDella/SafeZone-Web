<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('Pages.index');
});

Route::get('/informasi', function () {
    return view('Pages.informasi');
});

//manajemen agenda kegiatan
Route::get('/dashboard/event-kegiatan', [KegiatanController::class,'index'])->name('agenda.kegiatan.index');
Route::get('/dashboard/event-kegiatan/create', [KegiatanController::class,'create'])->name('agenda.kegiatan.create');
Route::get('/dashboard/event-kegiatan/edit/{id}', [KegiatanController::class,'edit'])->name('agenda.kegiatan.edit');
Route::put('/dashboard/event-kegiatan/edit/update/{id}', [KegiatanController::class,'update'])->name('agenda.kegiatan.update');
Route::post('/dashboard/event-kegiatan/create/store', [KegiatanController::class,'store'])->name('agenda.kegiatan.store');
Route::delete('/dashboard/event-kegiatan/destroy/{id}', [KegiatanController::class, 'destroy'])->name('agenda.kegiatan.destroy');

//manajemen konselor
Route::get('/dashboard/manajemen-konselor', [UserController::class,'indexKonselor'])->name('manajemen.konselor.index');
Route::get('/dashboard/manajemen-konselor/create', [UserController::class,'createKonselor'])->name('manajemen.konselor.create');
Route::get('/dashboard/manajemen-konselor/edit/{id}', [UserController::class,'editKonselor'])->name('manajemen.konselor.edit');
Route::put('/dashboard/manajemen-konselor/edit/update/{id}', [UserController::class,'updateKonselor'])->name('manajemen.konselor.update');
Route::post('/dashboard/manajemen-konselor/create/store', [UserController::class,'storeKonselor'])->name('manajemen.konselor.store');
Route::delete('/dashboard/manajemen-konselor/destroy/{id}', [UserController::class, 'destroyKonselor'])->name('manajemen.konselor.destroy');

//manajemen advokat
Route::get('/dashboard/manajemen-advokat', [UserController::class,'indexAdvokat'])->name('manajemen.advokat.index');
Route::get('/dashboard/manajemen-advokat/create', [UserController::class,'createAdvokat'])->name('manajemen.advokat.create');
Route::get('/dashboard/manajemen-advokat/edit/{id}', [UserController::class,'editAdvokat'])->name('manajemen.advokat.edit');
Route::put('/dashboard/manajemen-advokat/edit/update/{id}', [UserController::class,'updateAdvokat'])->name('manajemen.advokat.update');
Route::post('/dashboard/manajemen-advokat/create/store', [UserController::class,'storeAdvokat'])->name('manajemen.advokat.store');
Route::delete('/dashboard/manajemen-advokat/destroy/{id}', [UserController::class, 'destroyAdvokat'])->name('manajemen.advokat.destroy');

// Merubah active checkbox
Route::put('/dashboard/manajemen/status/{id}', [UserController::class, 'activeStatus'])->name('activeStatus');

// Route Form
Route::get('/form', [FormController::class, 'form'])->name('pages.form');
Route::get('/form/pengajuan-hukum', [FormController::class, 'form2'])->name('pengajuan-hukum');
Route::get('/form/konseling', [FormController::class, 'form2'])->name('konseling');
Route::get('/', [ViewController::class, 'index'])->name('index');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/report/pengaduan', [ReportController::class, 'index'])->name('report.pengaduan');
    Route::get('/dashboard/report/pengajuan-hukum', [ReportController::class, 'index'])->name('report.pengajuan-hukum');
    Route::get('/dashboard/report/pengajuan-konseling', [ReportController::class, 'index'])->name('report.pengajuan-konseling');
    Route::get('dashboard/report/agenda', [ReportController::class, 'edit'])->name('report.edit-pengaduan');
    Route::get('/dashboard/manajemen-user', [UserController::class, 'index'])->name('manajemen.user');
    Route::get('/dashboard/manajemen-user/create', [UserController::class, 'create'])->name('manajemen.user.create');
    Route::post('/dashboard/manajemen-user/create/store', [UserController::class, 'store'])->name('manajemen.user.store');
    Route::get('/dashboard/manajemen-user/edit/{id}', [UserController::class, 'edit'])->name('manajemen.user.edit');
    Route::put('/dashboard/manajemen-user/edit/update/{id}', [UserController::class, 'update'])->name('manajemen.user.update');
    Route::delete('/dashboard/manajemen-user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // CRUD FORM
    Route::post('/store', [FormController::class, 'store'])->name('store');
    Route::post('/store/hukum', [FormController::class, 'store_hukum'])->name('store.hukum');
    Route::post('/store/konseling', [FormController::class, 'store_konseling'])->name('store.konseling');
    Route::post('/form/konseling/{id}/update-status', [FormController::class, 'updateStatusKonseling'])->name('form.updateStatusKonseling');
    Route::post('/form/hukum/{id}/update-status', [FormController::class, 'updateStatusHukum'])->name('form.updateStatusHukum');
    Route::delete('/report/delete{id}', [FormController::class, 'destroy'])->name('report.destroy');
    Route::get('/form/pengajuan-hukum/{id}', [ViewController::class, 'show_hukum'])->name('show.hukum');
    Route::get('/form/pengajuan-konseling/{id}', [ViewController::class, 'show_konsel'])->name('show.konsel');

});
