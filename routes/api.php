<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

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
