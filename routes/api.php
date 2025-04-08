<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

// home
Route::get('/', function () {
     return 'Testing';
});

// Public routes (no auth)
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated user routes (SPA)
Route::middleware('auth:sanctum')->group(function () {
    // User profile
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/questions', QuestionController::class);
    });
});


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
