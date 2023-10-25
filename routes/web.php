<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\KondisiBarangController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);
    Route::resource('barang', BarangController::class);
    Route::get('/jenis-barang-options', [JenisBarangController::class, 'getJenisBarangOptions']);
    Route::get('/kondisi-barang-options', [KondisiBarangController::class, 'getKondisiBarangOptions']);

    Route::resource('rekam_medis', RekamMedisController::class);
    Route::get('/pasien-options', [PasienController::class, 'getPasienOptions']);
    Route::get('/dokter-options', [DokterController::class, 'getDokterOptions']);
});

require __DIR__.'/auth.php';
