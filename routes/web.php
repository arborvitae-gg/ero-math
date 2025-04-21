<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Public Views
Route::middleware('guest')->group(function () {
    Route::get('/login', [FrontendController::class, 'showLogin'])->name('login');
    Route::get('/register', [FrontendController::class, 'showRegister'])->name('register');
});

// Authenticated Views
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'showDashboard'])->name('dashboard');

    // Admin-only Views
    Route::middleware('admin')->group(function () {
        Route::get('/admin/questions', [AdminController::class, 'manageQuestions']);
        // Add other admin views here
    });
});
