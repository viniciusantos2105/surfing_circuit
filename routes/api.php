<?php

use App\Http\Controllers\HeatController;
use App\Http\Controllers\SurferController;
use App\Http\Controllers\WaveController;
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

Route::prefix('surfer') -> group(function () {
    Route::get('/', [SurferController::class, 'listSurfers']);
    Route::post('/register', [SurferController::class, 'registerSurfer']);
});

Route::prefix('heat') -> group(function () {
    Route::get('/{id}', [HeatController::class, 'getHeat']);
    Route::post('/register', [HeatController::class, 'registerHeat']);
});

Route::prefix('heat')->group(function () {
    Route::post('/{heatId}/surfer/{surferId}/wave', [WaveController::class, 'registerWave']);
});

Route::prefix('wave') -> group(function () {
    Route::get('/{id}', [WaveController::class, 'getWave']);
});

Route::prefix('wave/note') -> group(function () {

});
