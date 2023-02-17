<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::middleware('api:auth')->get('/getUser', [\App\Http\Controllers\LoginController::class,'getUserDetail']);

/**
 * 需要接口登录的
 */
Route::middleware('auth:api')->group(function () {
    Route::get('/getUser',  [\App\Http\Controllers\LoginController::class,'getUserDetail']);
});

/**
 * 登录接口
 */
Route::post('/login',[\App\Http\Controllers\LoginController::class,'loginJwt']);




