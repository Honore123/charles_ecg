<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\EcgApiController;
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
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('data/{patient}', [EcgApiController::class, 'index']);
    Route::prefix('users')->group(function() {
        Route::post('logout', [AuthApiController::class, 'logout']);
        Route::post('token/{patient}', [AuthApiController::class, 'addTokens']);
    });
    Route::get('data/{patient}/{state}', [EcgApiController::class, 'dataVisibility']);
   
});
Route::post('users/login', [AuthApiController::class, 'login']);
