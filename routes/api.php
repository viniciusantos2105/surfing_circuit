<?php

use App\Http\Controllers\HeatController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SurferController;
use App\Http\Controllers\WaveController;
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

Route::prefix('surfer')->group(function () {
    Route::get('/', [SurferController::class, 'listSurfers']);
    Route::post('/register', [SurferController::class, 'registerSurfer']);
});

Route::prefix('heat')->group(function () {
    Route::get('/{id}', [HeatController::class, 'getHeatDetails']);
    Route::get('/winner/{id}', [HeatController::class, 'getHeatWinner']);
    Route::post('/register', [HeatController::class, 'registerHeat']);
});

Route::prefix('wave')->group(function () {
    Route::get('/{id}', [WaveController::class, 'getWaveDetails']);
    Route::post('/heat/{heatId}/surfer/{surferId}', [WaveController::class, 'registerWave']);
});

Route::prefix('note')->group(function () {
    Route::get('/wave/{waveId}', [NoteController::class, 'getNoteResult']);
    Route::post('/wave/{waveId}', [NoteController::class, 'registerNote']);
});
