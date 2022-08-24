<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mahasiswa', [MahasiswaController::class,'index']);
Route::post('/mahasiswa', [MahasiswaController::class,'create']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class,'detail']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class,'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class,'delete']);

Route::get('/jurusan', [JurusanController::class,'index']);
Route::post('/jurusan', [JurusanController::class,'create']);
Route::get('/jurusan/{id}', [JurusanController::class,'detail']);
Route::put('/jurusan/{id}', [JurusanController::class,'update']);
Route::delete('/jurusan/{id}', [JurusanController::class,'delete']);

Route::get('/prodi', [ProdiController::class,'index']);
Route::post('/prodi', [ProdiController::class,'create']);
Route::get('/prodi/{id}', [ProdiController::class,'detail']);
Route::put('/prodi/{id}', [ProdiController::class,'update']);
Route::delete('/prodi/{id}', [ProdiController::class,'delete']);