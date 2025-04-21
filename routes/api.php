<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\QuestionController;

// Public routes (no auth)
Route::middleware('spa')->group(function () {
    Route::get('/sanctum/csrf-cookie', fn () => response()->noContent());
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated SPA routes
Route::middleware(['spa', 'auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        Route::apiResource('/questions', QuestionController::class);
    });
});
