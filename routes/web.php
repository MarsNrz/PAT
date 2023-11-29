<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\DataAkunController;
use App\Http\Controllers\KeluhanController;
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
    return view('home',[
    ]);
    
})->name('home');

// Route::get('/', function () {
//     return view('dataAkun',[
//         'users'=> User::get(),
//     ]);
    
// })->name('home');

Route::get('/home',[DataAlatController::class, 'home'])->name('home');

Route::get('/dataAlat',[DataAlatController::class, 'index'])->name('Alat');

Route::get('/tambahDataAlat',[DataAlatController::class, 'tambahDataAlat'])->name('tambahDataAlat');
Route::post('/insertDataAlat',[DataAlatController::class, 'insertDataAlat'])->name('insertDataAlat');

Route::get('/editDataAlat/{id_alat}', [DataAlatController::class, 'editDataAlat'])->name('editDataAlat');
Route::post('/updateDataAlat/{id_alat}', [DataAlatController::class, 'updateDataAlat'])->name('updateDataAlat');

Route::get('/deleteDataAlat/{id_alat}', [DataAlatController::class, 'deleteDataAlat'])->name('deleteDataAlat');
Route::get('/akun.json', 'DataAlatController@akunJson')->name('akun.json');



Route::get('/dataAkun', [DataAkunController::class, 'akun'])->name('akun');
Route::get('/register', [DataAkunController::class, 'tambahAkun'])->name('tambahDataAkun');
Route::post('/insertAkun', [DataAkunController::class, 'insertAkun'])->name('insertDataAkun');
Route::get('/deleteAkun/{id_akun}', [DataAkunController::class, 'deleteAkun'])->name('deleteDataAkun');
Route::get('/editAkun/{id_akun}', [DataAkunController::class, 'editAkun'])->name('editDataAkun');
Route::post('/updateAkun/{id_akun}', [DataAkunController::class, 'updateAkun'])->name('updateDataAkun');
Route::get('/akun.json', 'DataAkunController@akunJson')->name('akun.json');



Route::get('/dataKeluhan', [KeluhanController::class, 'keluhan'])->name('keluhan');
Route::get('/tambahDataKeluhan', [KeluhanController::class, 'tambahDataKeluhan'])->name('tambahDataKeluhan');
Route::post('/insertDataKeluhan', [KeluhanController::class, 'insertDataKeluhan'])->name('insertDataKeluhan');
Route::get('/deleteDataKeluhan/{id_keluhan}', [KeluhanController::class, 'deleteDataKeluhan'])->name('deleteDataKeluhan');
Route::get('/editDataKeluhan/{id_keluhan}', [KeluhanController::class, 'editDataKeluhan'])->name('editDataKeluhan');
Route::post('/updateDataKeluhan/{id_keluhan}', [KeluhanController::class, 'updateDataKeluhan'])->name('updateDataKeluhan');
Route::get('/akun.json', 'KeluhanController@akunJson')->name('akun.json');
