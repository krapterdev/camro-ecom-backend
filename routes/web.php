<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// website routers start
// Route::get('/', [FrontController::class, 'index']);

Route::get('/categories', [FrontController::class, 'homeCategories']);
Route::get('/slider', [FrontController::class, 'slider']);
Route::get('/WebsiteMarkquee', [FrontController::class, 'WebsiteMarkquee']);
Route::get('/WebsiteHomeProfile', [FrontController::class, 'WebsiteHomeProfile']);
Route::get('/WebsiteHomeAboutUs', [FrontController::class, 'WebsiteHomeAboutUs']);
Route::get('/WebsiteHomeOurProducts', [FrontController::class, 'WebsiteHomeOurProducts']);


// website routers end

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


Route::get('admin/logout', [AdminController::class, 'logout']);
