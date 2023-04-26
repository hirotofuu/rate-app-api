<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugyoController;
use App\Http\Controllers\KutikomiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/createJugyo', [JugyoController::class, 'createJugyo']);
Route::delete('/deleteJugyo/{id}', [JugyoController::class, 'deleteJugyo']);
Route::get('/fetchIndexJugyo', [JugyoController::class, 'fetchIndex']);
Route::put('/jugyoEdit', [JugyoController::class, 'editJugyo']);

Route::post('/createKutikomi', [KutikomiController::class, 'createKutikomoi']);
Route::delete('/deleteKutikomi/{id}', [JugyoController::class, 'deleteKutikomi']);
Route::get('/getKutikomi/{jugyo_id}', [KutikomiController::class, 'fetchJugyoKutikomi']);
Route::get('/showKutikomi/{id}', [KutikomiController::class, 'showJugyoKutikomi']);

