<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes forl your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);

Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);

Route::apiResource('addresses', App\Http\Controllers\Api\AddressController::class)->middleware('auth:sanctum');

Route::post('/order', [App\Http\Controllers\Api\OrderController::class,'order'])->middleware('auth:sanctum');

route::post('/callback', [App\Http\Controllers\Api\CallbackController::class,'callback']);

//check status order by id order
Route::get('/order/status/{id}', [App\Http\Controllers\Api\OrderController::class, 'checkStatusOrder'])->middleware('auth:sanctum');

//udpate fcm id
Route::post('/update-fcm', [App\Http\Controllers\Api\AuthController::class, 'updateFcmId'])->middleware('auth:sanctum');

//get order by user
Route::get('/orders', [App\Http\Controllers\Api\OrderController::class, 'getOrderByUser'])->middleware('auth:sanctum');

//get order by id
Route::get('/order/{id}', [App\Http\Controllers\Api\OrderController::class, 'getOrderById'])->middleware('auth:sanctum');
