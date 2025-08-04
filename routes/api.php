<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MailApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\ProductWeightController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\website\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/send-mail', [MailApiController::class, 'send']);


// All admin routes
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

        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::post('update/{id}', [ProductController::class, 'update']);
        Route::put('status/{id}/{status}', [ProductController::class, 'updateStatus']);
        Route::delete('delete/{id}', [ProductController::class, 'destroy']);
        Route::delete('/products/more-image/delete/{id}', [ProductController::class, 'deleteVariationImage']);


        Route::prefix('weight')->group(function () {
            Route::get('list', [ProductWeightController::class, 'index']);
            Route::post('add', [ProductWeightController::class, 'store']);
            Route::get('edit/{id}', [ProductWeightController::class, 'edit']);
            Route::post('update/{id}', [ProductWeightController::class, 'update']);
            Route::put('status/{id}/{status}', [ProductWeightController::class, 'updateStatus']);
            Route::delete('delete/{id}', [ProductWeightController::class, 'destroy']);
        });

        //  Size Routes
        Route::prefix('size')->group(function () {
            Route::get('list', [ProductSizeController::class, 'index']);
            Route::post('add', [ProductSizeController::class, 'store']);
            Route::get('edit/{id}', [ProductSizeController::class, 'edit']);
            Route::post('update/{id}', [ProductSizeController::class, 'update']);
            Route::put('status/{id}/{status}', [ProductSizeController::class, 'updateStatus']);
            Route::delete('delete/{id}', [ProductSizeController::class, 'destroy']);
        });

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
    Route::get('category/{slug}', [FrontController::class, 'getCategoryBySlug']);
    Route::get('allproduct', action: [FrontController::class, 'getAllProduct']);
    Route::get('product/{productslug}', [FrontController::class, 'getProductBySlug']);
    Route::get('productbycatid/{cateid}', [FrontController::class, 'productsByCategory']);
    Route::get('triply-products', [FrontController::class, 'productsByTriply']);
    Route::get('new-arrivals-products', [FrontController::class, 'productsByNewArrivals']);
    Route::get('best-sellers-products', [FrontController::class, 'productsByBestSellers']);
    Route::get('trending-products-products', [FrontController::class, 'productsByTrendingProducts']);

    // Authentication Routes
    Route::post('user-register', [UserController::class, 'register']);
    // Route::post('user-login', [UserController::class, 'login']);
    Route::post('/user-login', [UserController::class, 'login']);
    Route::post('/user-logout', [UserController::class, 'logout']);

    Route::post('user-profile', [UserController::class, 'userProfile']);
    Route::post('user-check', [UserController::class, 'userCheck']);
    Route::post('forget-password', [UserController::class, 'forgetPassword']);
    Route::post('reset-password', [UserController::class, 'resetPassword']);
    Route::post('update-password', [UserController::class, 'updatePassword']);
    Route::post('verify-email', [UserController::class, 'verifyEmail']);

    Route::post('add-cart', [CartController::class, 'store']);









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


// {
//   "name": "Sahil Kumar",
//   "phone": "9876543210",
//   "message": "Testing email from Postman!",
//   "subject": "Postman Email Test"
// }
