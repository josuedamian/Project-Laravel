<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\LoginApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('category',CategoryController::class);
// Route::apiResource('brand',BrandController::class);
// Route::apiResource('instrument',InstrumentController::class);

Route::post('/login', [LoginApiController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('category',CategoryController::class);
    Route::apiResource('brand',BrandController::class);
    Route::apiResource('instrument',InstrumentController::class);
});