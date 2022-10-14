<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/foods/{category}',[CategoryController::class,'foods']);
Route::post('/order/save',[OrderController::class,'save']);
Route::post('/order/change-status/{order}',[OrderController::class,'change_status']);
Route::post('/orders',[OrderController::class,'index']);
