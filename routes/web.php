<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\ProductsController;


// Main Page Route

Route::get('/', function () {
    return view('content.dashboard.dashboards-analytics');
});
// Route::resource('content.dashboard.dashboards-analytics', ProductsController::class);
// Route::get('/', ProductsController::class .'index')->name('content.dashboard.dashboards-analytics');
// Example route
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/getProduct', [ProductsController::class, 'create'])->name('content.dashboard.create');
Route::get('/editProduct', [ProductsController::class, 'edit'])->name('content.dashboard.edit');
Route::post('/postProduct', [ProductsController::class, 'store'])->name('content.dashboard.store');
// Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
