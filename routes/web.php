<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('post-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function(){
        Route::get('/', [TransactionController::class, 'index'])->name('index');
    });
});


