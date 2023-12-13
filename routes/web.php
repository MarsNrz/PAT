<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\DataPinjamController;
use App\Models\User;


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
    return view('login',[
    ]);
    
})->name('home');

Route::get('/navbar', function(){
    return view('navbar',[]);
})->name('navbar');

/* Data Alat */
Route::get('/home',[DataAlatController::class, 'home'])->name('home');

Route::get('/dataAlat',[DataAlatController::class, 'index'])->name('Alat');

Route::get('/tambahDataAlat',[DataAlatController::class, 'tambahDataAlat'])->name('tambahDataAlat');
Route::post('/insertDataAlat',[DataAlatController::class, 'insertDataAlat'])->name('insertDataAlat');

Route::get('/editDataAlat/{id_alat}', [DataAlatController::class, 'editDataAlat'])->name('editDataAlat');
Route::post('/updateDataAlat/{id_alat}', [DataAlatController::class, 'updateDataAlat'])->name('updateDataAlat');

Route::get('/deleteDataAlat/{id_alat}', [DataAlatController::class, 'deleteDataAlat'])->name('deleteDataAlat');
Route::get('/akun.json', 'DataAlatController@akunJson')->name('akun.json');


/* Data Akun */
Route::get('/dataAkun', [DataAkunController::class, 'akun'])->name('akun');
Route::get('/dat/dataAkun', [DataAkunController::class, 'getDataAkun'])->name('dat.dataAkun');
Route::get('/register', [DataAkunController::class, 'tambahAkun'])->name('tambahDataAkun');
Route::post('/insertAkun', [DataAkunController::class, 'insertAkun'])->name('insertDataAkun');
Route::get('/akun', 'DataAkunController@akun')->name('akun');
Route::get('/edit/{id_akun}', 'DataAkunController@editAkun')->name('editDataAkun');
Route::post('/update/{id_akun}', 'DataAkunController@updateAkun')->name('updateDataAkun');
Route::get('/tambahdataAkun', [DataAkunController::class, 'index'])->name('tambahdataAkun');
Route::delete('/delete-data/{id_akun}', 'DataAkunController@deleteDataAkun')->name('deleteDataAkun');
Route::get('/login', [DataAkunController::class, 'login'])->name('login');
Route::post('/loginproses',[DataAkunController::class,'loginproses'])->name('loginproses');


/* Data Keluhan */
Route::get('/dataKeluhan', [KeluhanController::class, 'keluhan'])->name('keluhan');
Route::get('/dat/dataKeluhan', [KeluhanController::class, 'getDataKeluhan'])->name('dat.dataKeluhan');
Route::post('/insertDataKeluhan', [KeluhanController::class, 'insertDataKeluhan'])->name('insertDataKeluhan');
Route::get('/keluhan', 'KeluhanController@keluhan')->name('kkeluhan');
Route::get('/edit/{id_keluhan}', 'KeluhanController@editKeluhan')->name('editKeluhan');
Route::post('/update/{id_keluhan}', 'KeluhanController@updateKeluhan')->name('updateKeluhan');
Route::get('/tambahDataKeluhan', [KeluhanController::class, 'tambahDataKeluhan'])->name('tambahDataKeluhan');
Route::delete('/delete-data/{id_keluhan}', 'KeluhanController@deleteKeluhan')->name('deleteKeluhan');

/* Data Pinjam */
Route::get('/dataPinjam', [DataPinjamController::class, 'pinjam'])->name('pinjam');
Route::get('/tambahDataPinjam', [DataPinjamController::class, 'tambahDataPinjam'])->name('tambahDataPinjam');
Route::post('/insertDataPinjam', [DataPinjamController::class, 'insertDataPinjam'])->name('insertDataPinjam');
Route::get('/deleteDataPinjam/{id_pinjam}', [DataPinjamController::class, 'deleteDataPinjam'])->name('deleteDataPinjam');
Route::get('/editDataPinjam/{id_pinjam}', [DataPinjamController::class, 'editDataPinjam'])->name('editDataPinjam');
Route::post('/updateDataPinjam/{id_pinjam}', [DataPinjamController::class, 'updateDataPinjam'])->name('updateDataPinjam');
Route::get('/akun.json', 'KeluhanController@akunJson')->name('akun.json');
