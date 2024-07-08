<?php

use App\Http\Controllers\SurferController;
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
    Route::post('/create', [SurferController::class, 'createSurfer']);
});

Route::prefix('api/battery') -> group(function () {

});

Route::prefix('api/wave') -> group(function () {

});

Route::prefix('api/wave/note') -> group(function () {

});
