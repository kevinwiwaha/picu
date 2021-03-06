<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\PatientController;
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

Route::middleware('auth')->get('/', [DashboardController::class, 'index']);
Route::middleware('auth')->prefix('pasien')->group(function () {
    Route::get('/detail/{patient}', [PatientController::class, 'show']);
    Route::delete('/hapus/{patient}', [PatientController::class, 'destroy']);
    Route::post('/pdf', [PatientController::class, 'createpdf']);
    Route::get('/tambah-pasien', [PatientController::class, 'create']);
    Route::get('/input-pasien', [PatientController::class, 'store']);
    Route::post('/generate', [PatientController::class, 'reciepe']);
});
Route::middleware('auth')->prefix('diagnosis')->group(function () {
    Route::get('/', [DiagnosisController::class, 'index']);

    Route::get('/tambah-diagnosis', [DiagnosisController::class, 'create']);
    Route::put('/tambah-diagnosis', [DiagnosisController::class, 'store']);
    Route::delete('/hapus', [DiagnosisController::class, 'destroy']);
    Route::get('/edit/{diagnosis}', [DiagnosisController::class, 'edit']);
    Route::patch('/edit', [DiagnosisController::class, 'update']);
    Route::get('/{diagnosis}', [DiagnosisController::class, 'show']);
});
Route::middleware('auth')->prefix('intervensi')->group(function () {
    Route::get('/', [InterventionController::class, 'index']);
    Route::get('/tambah-intervensi', [InterventionController::class, 'create']);
    Route::put('/tambah-intervensi', [InterventionController::class, 'store']);
    Route::delete('/hapus-intervensi', [InterventionController::class, 'destroy']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
