<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BemolenController;
use App\Http\Controllers\API\BackpageController;
use App\Http\Controllers\API\PerusahaanController;
use App\Http\Controllers\API\MapsBackpageController; // Tambahkan ini

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

Route::prefix('api')->group(function () {
    // ... (route lainnya)
    Route::get('backpages', [BackpageController::class, 'index']);
    Route::get('backpages/{backpage}', [BackpageController::class, 'show']);
    Route::post('backpages', [BackpageController::class, 'store']);
    Route::post('backpages/{backpage}/update', [BackpageController::class, 'update']);
    Route::delete('backpages/{backpage}', [BackpageController::class, 'destroy']);

    Route::get('maps_backpages', [MapsBackpageController::class, 'index']);
    Route::get('maps_backpages/{mapsBackpage}', [MapsBackpageController::class, 'show']);
    Route::post('maps_backpages', [MapsBackpageController::class, 'store']);
    Route::post('maps_backpages/{mapsBackpage}/update', [MapsBackpageController::class, 'update']);
    Route::delete('maps_backpages/{mapsBackpage}', [MapsBackpageController::class, 'destroy']);

    Route::get('perusahaans', [PerusahaanController::class, 'index']);
    Route::get('perusahaans/{perusahaan}', [PerusahaanController::class, 'show']);
    Route::post('perusahaans', [PerusahaanController::class, 'store']);
    Route::post('perusahaans/{perusahaan}/update', [PerusahaanController::class, 'update']);
    Route::delete('perusahaans/{perusahaan}', [PerusahaanController::class, 'destroy']);
});

Route::post('login',[AuthController::class,'login']);
Route::resource('landingpage',BemolenController::class);
Route::post('/landingpage/{id}',[BemolenController::class,'update']);
Route::get('/perusahaan',[BemolenController::class,'Perusahaan']);
