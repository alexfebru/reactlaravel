<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\ProductsController;



// Main Page Route

// Route::get('/', function () {
//     return view('content.dashboard.dashboards-analytics');
// });
// Route::resource('content.dashboard.dashboards-analytics', ProductsController::class);
// Route::get('/', ProductsController::class .'index')->name('content.dashboard.dashboards-analytics');
// Example route
Route::get('/', [ProductsController::class, 'indexs']);

Route::controller(App\Http\Controllers\ProductsController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/create', 'create');
    Route::post('products/create', 'store');
    Route::get('products/{id}', 'show');
    Route::put('products/{id}/update', 'update');
    Route::get('products/{id}/delete', 'destroy');
});
