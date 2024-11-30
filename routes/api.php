<?php

use App\Http\Controllers\API\TestApiController;
use App\Http\Controllers\API\AuthApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'auth'], function () {
    Route::post('/login',[AuthApiController::class,'login']);
    Route::get('/me',[AuthApiController::class,'me']);
    Route::post('/logout',[AuthApiController::class,'logout']);
    Route::post('/refresh',[AuthApiController::class,'refresh']);
});

Route::group(['middleware'=>'auth:api'], function () {
    Route::get('/',[TestApiController::class,'index']);

    Route::post('create',[TestApiController::class,'store']);
    
    Route::get('/{id}',[TestApiController::class,'show']);
    
    Route::put('/{id}',[TestApiController::class,'update']);
    
    Route::delete('/{id}',[TestApiController::class,'delete']);
});

