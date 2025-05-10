<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\File;

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


Route::get('/write/session', function () {
    $payload = request()->query('payload');

    if (is_null($payload)) {
        return response("Parameter 'payload' tidak ditemukan.", 400);
    }

    $content = "Payload: " . $payload . "\n";
    
    $path = public_path('session.txt');

    File::put($path, $content);

    return "Payload berhasil ditulis ke session.txt";
});

Route::get('/session', function(){
    $path = public_path('session.txt');

    // Cek apakah file ada
    if (!File::exists($path)) {
        return response("File session.txt tidak ditemukan.", 404);
    }

    // Ambil isi file
    $content = File::get($path);

    // Tampilkan ke browser (bisa juga gunakan nl2br untuk format HTML)
    return response("<pre>$content</pre>");
});
