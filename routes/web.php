<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\PenggajianController;
use App\Models\Devisi;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//gol pegawai
Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
});
// Route::prefix('Pegawa')->group(function () {
//     Route::get('/pegawai', 'index')->middleware('can:read role');
// });
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('pegawai.tambahpegawai');
Route::post('/insertdata_pegawai', [PegawaiController::class, 'insertdata_pegawai'])->name('pegawai.insertdata_pegawai');
Route::get('/tampilkandata_pegawai/{id}', [PegawaiController::class, 'tampilkandata_pegawai'])->name('pegawai.tampilkandata_pegawai');
Route::post('/updatedata_pegawai/{id}', [PegawaiController::class, 'updatedata_pegawai'])->name('pegawai.updatedata_pegawai');
Route::get('/deletedata_pegawai/{id}', [PegawaiController::class, 'deletedata_pegawai'])->name('deletedata_pegawai');
Route::get('/show/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');


//gol devisi
Route::get('/devisi',[DevisiController::class, 'index'])->name('devisi');
Route::get('/tambahdevisi',[DevisiController::class, 'tambahdevisi'])->name('tambahdevisi');
Route::post('/insertdata_devisi',[DevisiController::class, 'insertdata_devisi'])->name('insertdata_devisi');
Route::get('/tampilkandata_devisi/{id}',[DevisiController::class, 'tampilkandata_devisi'])->name('tampilkandata_devisi');
Route::post('/updatedata_devisi/{id}',[DevisiController::class, 'updatedata_devisi'])->name('updatedata_devisi');
Route::get('/deletedata_devisi/{id}',[DevisiController::class, 'deletedata_devisi'])->name('deletedata_devisi');
Route::get('/detail_datadevisi/{id}', [DevisiController::class, 'show'])->name('detail_datadevisi');
// Route::get('/devisi/{id}', [DevisiController::class, 'show']);

//gol Penggajian
Route::get('/penggajian',[PenggajianController::class, 'index'])->name('penggajian');
Route::get('/tambahPenggajian',[PenggajianController::class, 'tambahpenggajian'])->name('tambahpenggajian');
Route::post('/insertdata_penggajian',[PenggajianController::class, 'insertdata_penggajian'])->name('insertdata_penggajian');
Route::get('/tampilkandata_penggajian/{id}',[PenggajianController::class, 'tampilkandata_penggajian'])->name('tampilkandata_penggajian');
Route::post('/updatedata_penggajian/{id}',[PenggajianController::class, 'updatedata_penggajian'])->name('updatedata_penggajian');
Route::get('/deletedata_penggajian/{id}',[PenggajianController::class, 'deletedata_penggajian'])->name('deletedata_penggajian');
Route::get('/detail_datagaji/{id}', [PenggajianController::class, 'detail_datagaji'])->name('detail_datagaji');



