<?php

use App\Http\Controllers\DivisiController;
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
Route::get('/laporan', function () {
    return view('view');
});

Route::get('/Program/{program}/Divisi/{id}', [DivisiController::class, 'show'])->name('showDataDosen');
Route::put('/updateDataDosen/{id}', [DivisiController::class, 'updateDataDosen'])->name('updateDataDosen'); 
Route::delete('/deleteDataDosen/{id}', [DivisiController::class, 'deleteDataDosen'])->name('deleteDataDosen');

Route::resource('Program', ProgramController::class);
Route::resource('Divisi', DivisiController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    
});

Route::group(['middleware' => 'auth'], function () {

});

require __DIR__.'/auth.php';
