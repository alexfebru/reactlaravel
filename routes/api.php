<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
Route::apiResource('products', ProductsController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*  route::apiResource('productApi', 'App\Http\Controllers\ProductsController'); */
/* Route::get('product', [ProductsController::class]); */


/* Route::get('/products', 'App\Http\Controllers\ProductsController@index');
Route::post('/products', 'App\Http\Controllers\ProductsController@store'); */
