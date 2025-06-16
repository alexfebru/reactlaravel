<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\ResetPasswordBasic;


// Main Page Route

/* Route::get('/', function () {
    return view('content.dashboard.dashboards-analytics');
}); */
// Route::resource('content.dashboard.dashboards-analytics', ProductsController::class);
// Route::get('/', ProductsController::class .'index')->name('content.dashboard.dashboards-analytics');
// Example route
Route::get('/', [ProductsController::class, 'indexs']);

// Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// Route::get('/', [ProductsController::class, 'indexs'])
//     ->middleware('jwt.verify')
//     ->name('dashboard');


Route::controller(App\Http\Controllers\ProductsController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/create', 'create');
    Route::post('products/create', 'store');
    Route::get('products/{id}', 'show');
    Route::get('products/{id}/edit', 'edit');
    Route::put('products/{id}/update', 'update');
    Route::get('products/{id}/delete', 'destroy');

});


Route::get('auth-login', [AuthController::class, 'login'])->name('auth-login');
Route::post('/auth-login', [AuthController::class, 'login'])->name('auth-login');
Route::post('/auth-register', [AuthController::class, 'register'])->name('auth-register');
Route::get('auth-register', [AuthController::class, 'register'])->name('auth-register');
Route::get('auth-logout', [AuthController::class, 'logout'])->name('auth-logout');
Route::get('auth-me', [AuthController::class, 'me'])->name('auth-me');
Route::get('auth-refresh', [AuthController::class, 'refresh'])->name('auth-refresh');