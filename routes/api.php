<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DaftarEskulController;
use App\Http\Controllers\Api\EskulController;
use App\Http\Controllers\Api\KartuEskulController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::apiResource('daftar', DaftarEskulController::class);

    Route::patch('daftar/{id}/setuju', [DaftarEskulController::class, 'setuju']);
    Route::patch('daftar/{id}/tolak', [DaftarEskulController::class, 'tolak']);

    Route::get('kartu/{id}', [KartuEskulController::class, 'show']);

    Route::get('/eskul', [EskulController::class, 'index']);   // GET /api/eskul
    Route::get('/eskul/{id}', [EskulController::class, 'show']); // GET /api/eskul/{id}
    
});


