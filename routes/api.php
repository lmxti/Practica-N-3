<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

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


Route::prefix('/perro')->group(function () {
    Route::post('/create', [PerroController::class, 'createPerro']);
    Route::get('/view', [PerroController::class, 'viewPerro']);
    Route::put('/update', [PerroController::class, 'updatePerro']);
    Route::delete('/delete', [PerroController::class, 'deletePerro']);
    Route::get('/viewAll', [PerroController::class, 'viewAllPerro']);
});

Route::prefix('/interaccion')->group(function () {
    Route::post('/create', [InteraccionController::class, 'createInteraccion']);
    Route::get('/view', [InteraccionController::class, 'viewInteraccion']);
    Route::put('/update', [InteraccionController::class, 'updateInteraccion']);
    Route::delete('/delete', [InteraccionController::class, 'deleteInteraccion']);
    Route::get('/viewAll', [InteraccionController::class, 'viewAllInteraccion']);
});