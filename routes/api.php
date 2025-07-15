<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\website\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// category routes
Route::prefix('admin/category')->group(function () {
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('{id}', [CategoryController::class, 'edit']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::put('status/{id}/{status}', [CategoryController::class, 'updateStatus']);
    Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
});

// website routes
Route::prefix('website')->group(function () {
    Route::get('categories', [FrontController::class, 'homeCategories']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
    // Route::get('products', [FrontController::class, 'homeProducts']);
});



// Route::get('/category/categories', [CategoryController::class, 'index']);


// Route::post('/category/add-category', [CategoryController::class, 'storeOrUpdate']);
// Route::post('/category/list-category', [CategoryController::class, 'storeOrUpdate']);


// Route::post('/register', [UserController::class, 'register']);
// // Route::post('/login', [UserController::class, 'authenticate']);


// Route::post('/login', [UserController::class, 'authenticate']);
