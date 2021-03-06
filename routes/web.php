<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotulenController;
use App\Http\Controllers\Admin\NotulisController;
use App\Http\Controllers\Admin\PimpinanRapatController;
use App\Http\Controllers\Notulis\ManajemenNotulenController;
use App\Http\Controllers\Notulis\NotulisDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'  => 'administrator/'],function(){
    Route::get('/',[DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::group(['prefix'  => 'administrator/manajemen_notulis'],function(){
    Route::get('/',[NotulisController::class, 'index'])->name('admin.notulis');
    Route::post('/',[NotulisController::class, 'post'])->name('admin.notulis.post');
    Route::get('/{id}/edit',[NotulisController::class, 'edit'])->name('admin.notulis.edit');
    Route::patch('/',[NotulisController::class, 'update'])->name('admin.notulis.update');
    Route::delete('/',[NotulisController::class, 'delete'])->name('admin.notulis.delete');
    Route::patch('/update_password',[NotulisController::class, 'updatePassword'])->name('admin.notulis.update_password');
});

Route::group(['prefix'  => 'administrator/manajemen_notulen'],function(){
    Route::get('/',[NotulenController::class, 'index'])->name('admin.notulen');
    Route::get('/cetak/{id}',[NotulenController::class,'cetak'])->name('admin.cetak');
});

Route::group(['prefix'  => 'notulis/'],function(){
    Route::get('/',[NotulisDashboardController::class, 'dashboard'])->name('notulis.dashboard');
    Route::patch('/update_password',[NotulisDashboardController::class, 'updatePassword'])->name('notulis.notulen.update_password');
});

Route::group(['prefix'  => 'notulis/manajemen_notulen'],function(){
    Route::get('/',[ManajemenNotulenController::class, 'index'])->name('notulis.notulen');
    Route::get('/add',[ManajemenNotulenController::class, 'add'])->name('notulis.notulen.add');
    Route::post('/',[ManajemenNotulenController::class, 'post'])->name('notulis.notulen.post');
    Route::delete('/{id}',[ManajemenNotulenController::class, 'delete'])->name('notulis.notulen.delete');
    Route::get('/cetak/{id}',[ManajemenNotulenController::class,'cetak'])->name('notulis.notulen.cetak');
    Route::get('/dokumentasi/{id}',[ManajemenNotulenController::class,'dokumentasi'])->name('notulis.notulen.dokumentasi');
    Route::post('/dokumentasi',[ManajemenNotulenController::class,'dokumentasiPost'])->name('notulis.notulen.dokumentasiPost');
    Route::delete('{id}/dokumentasi//{notulen_id}',[ManajemenNotulenController::class,'dokumentasiDelete'])->name('notulis.notulen.dokumentasiDelete');
});

Route::group(['prefix'  => 'administrator/manajemen_pimpinan'],function(){
    Route::get('/',[PimpinanRapatController::class, 'index'])->name('admin.pimpinan');
    Route::post('/',[PimpinanRapatController::class, 'post'])->name('admin.pimpinan.post');
    Route::patch('/{id}nonaktifkan',[PimpinanRapatController::class, 'nonaktifkan'])->name('admin.pimpinan.nonaktifkan');
    Route::patch('/{id}/aktifkan',[PimpinanRapatController::class, 'aktifkan'])->name('admin.pimpinan.aktifkan');
    Route::delete('/',[PimpinanRapatController::class, 'delete'])->name('admin.pimpinan.delete');
});