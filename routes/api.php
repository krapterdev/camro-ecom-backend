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
// Route::prefix('admin/category')->group(function () {
//     Route::get('categories', [CategoryController::class, 'index']);
//     Route::get('{id}', [CategoryController::class, 'edit']);
//     Route::post('update/{id}', [CategoryController::class, 'update']);
//     Route::post('add-category', [CategoryController::class, 'store']);
//     Route::put('status/{id}/{status}', [CategoryController::class, 'updateStatus']);
//     Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
// });

// 🔐 All admin routes
Route::prefix('admin')->group(function () {

    // Category Routes
    Route::prefix('category')->group(function () {
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('{id}', [CategoryController::class, 'edit']);
        Route::post('update/{id}', [CategoryController::class, 'update']);
        Route::post('add-category', [CategoryController::class, 'store']);
        Route::put('status/{id}/{status}', [CategoryController::class, 'updateStatus']);
        Route::delete('delete/{id}', [CategoryController::class, 'destroy']);
    });

    // Product Routes
    Route::prefix('products')->group(function () {

        // Weight Routes
        // Route::prefix('weight')->group(function () {
        //     Route::get('list', [ProductWeightController::class, 'index']);
        //     Route::get('add', [ProductWeightController::class, 'create']);
        //     Route::post('add', [ProductWeightController::class, 'store']);
        //     Route::get('edit/{id}', [ProductWeightController::class, 'edit']);
        //     Route::post('update/{id}', [ProductWeightController::class, 'update']);
        //     Route::put('status/{id}/{status}', [ProductWeightController::class, 'updateStatus']);
        //     Route::delete('delete/{id}', [ProductWeightController::class, 'destroy']);
        // });

        //  Size Routes
        // Route::prefix('size')->group(function () {
        //     Route::get('list', [ProductSizeController::class, 'index']);
        //     Route::get('add', [ProductSizeController::class, 'create']);
        //     Route::post('add', [ProductSizeController::class, 'store']);
        //     Route::get('edit/{id}', [ProductSizeController::class, 'edit']);
        //     Route::post('update/{id}', [ProductSizeController::class, 'update']);
        //     Route::put('status/{id}/{status}', [ProductSizeController::class, 'updateStatus']);
        //     Route::delete('delete/{id}', [ProductSizeController::class, 'destroy']);
        // });

        //  Pack Routes (Optional)
        // Route::prefix('pack')->group(function () {
        //     Route::get('list', [ProductPackController::class, 'index']);
        //     Route::get('add', [ProductPackController::class, 'create']);
        //     Route::post('add', [ProductPackController::class, 'store']);
        // });

        //  Discount Routes (Optional)
        // Route::prefix('discount')->group(function () {
        //     Route::get('list', [ProductDiscountController::class, 'index']);
        //     Route::get('add', [ProductDiscountController::class, 'create']);
        //     Route::post('add', [ProductDiscountController::class, 'store']);
        // });
    });
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
