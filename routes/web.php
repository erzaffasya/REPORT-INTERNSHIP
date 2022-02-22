<?php

use App\Http\Controllers\AksesProgramController;
use App\Http\Controllers\AksesDivisiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProgramController;
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
    return view('admin.index');
});

Route::get('/mahasiswa', function () {
    return view('index');
});

Route::get('laporan', [LaporanController::class, 'index'])->name('indexLaporan');
Route::get('view-laporan/{id}', [LaporanController::class, 'show'])->name('showLaporan');
Route::put('/updateLaporan', [LaporanController::class, 'update'])->name('updateLaporan');

Route::get('/Program/{program}/Divisi/{id}', [DivisiController::class, 'show'])->name('showDataDosen');
Route::put('/updateDataDosen/{id}', [DivisiController::class, 'updateDataDosen'])->name('updateDataDosen'); 
Route::delete('/deleteDataDosen/{id}', [DivisiController::class, 'deleteDataDosen'])->name('deleteDataDosen');

Route::resource('Program', ProgramController::class);
Route::resource('Divisi', DivisiController::class);
Route::controller(AksesProgramController::class)->group(function () {
    Route::get('aksesProgram', 'index');
    Route::get('tambahAksesProgram/{id}', 'create');
    Route::post('storeAksesProgram', 'store');
    Route::put('aksesProgram/{id}', 'update');
    Route::delete('aksesProgram/{id}', 'delete');
});
Route::controller(AksesDivisiController::class)->group(function () {
    Route::get('aksesDivisi', 'index');
    Route::get('tambahAksesDivisi/{id}', 'create');
    Route::post('storeAksesDivisi', 'store');
    Route::put('updateAksesDivisi/{id}', 'update');
    Route::delete('destroyAksesDivisi/{id}', 'delete');
});
// Route::resource('aksesDivisi', AksesDivisiController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    
});

Route::group(['middleware' => 'auth'], function () {

});

require __DIR__.'/auth.php';
