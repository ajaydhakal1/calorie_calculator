<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CalorieController;
use App\Http\Controllers\api\v1\DietController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'userProfile']);
        Route::post('/refresh', [AuthController::class, 'refreshToken']);
    });
});

Route::prefix('v1')->group(function () {
    Route::post('/calculate', [CalorieController::class, 'calculate']);
    Route::post('/diet-plan', [DietController::class, 'generate']);
    Route::get('/history', [CalorieController::class, 'history'])->middleware('auth:sanctum');
});
