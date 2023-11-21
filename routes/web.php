<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataAlatController;


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
    return view('Home');
})->name('home');

Route::get('/dataAlat',[DataAlatController::class, 'index'])->name('Alat');

Route::get('/tambahDataAlat',[DataAlatController::class, 'tambahDataAlat'])->name('tambahDataAlat');
Route::post('/insertDataAlat',[DataAlatController::class, 'insertDataAlat'])->name('insertDataAlat');

Route::get('/editDataAlat/{id_alat}', [DataAlatController::class, 'editDataAlat'])->name('editDataAlat');
Route::post('/updateDataAlat/{id_alat}', [DataAlatController::class, 'updateDataAlat'])->name('updateDataAlat');

Route::get('/deleteDataAlat/{id_alat}', [DataAlatController::class, 'deleteDataAlat'])->name('deleteDataAlat');