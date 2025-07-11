<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WebsiteSliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\website\UserController;
use App\Http\Controllers\WebsiteMarqueeContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// website routers start
// Route::get('/', [FrontController::class, 'index']);

Route::get('/categories', [FrontController::class, 'homeCategories']);
Route::get('/products', [FrontController::class, 'Homeproducts']);
Route::get('/productsisflavor', [FrontController::class, 'HomeProductsIsFlavor']);
Route::get('/productsissavor', [FrontController::class, 'HomeProductsIsSavor']);
Route::get('/slider', [FrontController::class, 'Homeslider']);
Route::get('/markquee', [FrontController::class, 'HomeMarkquee']);
Route::get('/WebsiteMarkquee', [FrontController::class, 'WebsiteMarkquee']);
Route::get('/WebsiteHomeProfile', [FrontController::class, 'WebsiteHomeProfile']);
Route::get('/WebsiteHomeAboutUs', [FrontController::class, 'WebsiteHomeAboutUs']);
Route::get('/WebsiteHomeOurProducts', [FrontController::class, 'WebsiteHomeOurProducts']);





Route::get('admin', [AdminController::class, 'index'])->middleware('admin_guest');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    // category router start
    // get all data Category in list
    Route::get('admin/category', [CategoryController::class, 'index']);
    // get Update data category
    Route::get('admin/category/manage_category/{id?}', [CategoryController::class, 'manage_category']);
    // Add / Update Form Submit
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    // delete category
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    // status change category
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    // category router end


    // Coupons router start
    // get all data Coupon in list
    Route::get('admin/coupon', [CouponController::class, 'index']);
    // get Update data Coupon
    Route::get('admin/coupon/manage_coupon/{id?}', [CouponController::class, 'manage_coupon']);
    // Add / Update Form Submit
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
    // delete Coupon
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    // status change Coupon
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
    // Coupon router end

});

// Route::middleware('auth')->group(function () {
//     Route::get('/cart', [CartController::class, 'index']);
//     Route::post('/cart', [CartController::class, 'store']);
//     Route::delete('/cart/{id}', [CartController::class, 'destroy']);
// });

// Route::post('/login', [UserController::class, 'authenticate']);
// Route::post('/register', [UserController::class, 'register']);
// Route::get('/csrf-token', function () {
//     return response()->json([
//         'csrf_token' => csrf_token(),
//     ]);
// });

// Protected route
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// website routers end

// Route::get('admin', [AdminController::class, 'index'])->middleware('admin_guest');
// // Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

// Route::middleware(['web', 'admin_guest'])->group(function () {
//     Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
    
//     Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

//     // category router start
//     // get all data Category in list
//     Route::get('admin/category', [CategoryController::class, 'index']);
//     // get Update data category
//     Route::get('admin/category/manage_category/{id?}', [CategoryController::class, 'manage_category']);
//     // Add / Update Form Submit
//     Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
//     // delete category
//     Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
//     // status change category
//     Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
//     // home status change category
//     Route::get('admin/category/ishome/{ishome}/{id}', [CategoryController::class, 'ishome']);
//     // category router end


//     // Slider router start
//     // get all data slider in list
//     Route::get('admin/slider', [WebsiteSliderController::class, 'index']);
//     // get Update data slider
//     Route::get('admin/slider/manage_slider/{id?}', [WebsiteSliderController::class, 'manage_slider']);
//     // Add / Update Form Submit
//     Route::post('admin/slider/manage_slider_process', [WebsiteSliderController::class, 'manage_slider_process'])->name('slider.manage_slider_process');
//     // delete slider
//     Route::get('admin/slider/delete/{id}', [WebsiteSliderController::class, 'delete']);
//     // status change slider
//     Route::get('admin/slider/status/{status}/{id}', [WebsiteSliderController::class, 'status']);
//     // Slider router end


//     // markquee router start
//     // get all data markquee in list
//     Route::get('admin/markquee', [WebsiteMarqueeContoller::class, 'index']);
//     // get Update data markquee
//     Route::get('admin/markquee/manage_markquee/{id?}', [WebsiteMarqueeContoller::class, 'manage_markquee']);
//     // Add / Update Form Submit
//     Route::post('admin/markquee/manage_markquee_process', [WebsiteMarqueeContoller::class, 'manage_markquee_process'])->name('markquee.manage_markquee_process');
//     // delete markquee
//     Route::get('admin/markquee/delete/{id}', [WebsiteMarqueeContoller::class, 'delete']);
//     // status change markquee
//     Route::get('admin/markquee/status/{status}/{id}', [WebsiteMarqueeContoller::class, 'status']);
//     // markquee router end


//     // product router start
//     // get all data product in list
//     Route::get('admin/product', [ProductController::class, 'index']);
//     // get Update data slider
//     Route::get('admin/product/manage_product/{id?}', [ProductController::class, 'manage_product']);
//     // Add / Update Form Submit
//     Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');
//     // Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
//     // Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);

//     // Slider router end




//     // Coupons router start
//     // get all data Coupon in list
//     Route::get('admin/coupon', [CouponController::class, 'index']);
//     // get Update data Coupon
//     Route::get('admin/coupon/manage_coupon/{id?}', [CouponController::class, 'manage_coupon']);
//     // Add / Update Form Submit
//     Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
//     // delete Coupon
//     Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
//     // status change Coupon
//     Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
//     // Coupon router end

// });


Route::get('admin/logout', [AdminController::class, 'logout']);
