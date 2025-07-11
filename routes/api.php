<?php

use App\Http\Controllers\website\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'authenticate']);


Route::post('/login', [UserController::class, 'authenticate']);