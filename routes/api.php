<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
     return 'Testing';
});

Route::apiResource('users', UserController::class);
Route::apiResource('questions', QuestionController::class);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
