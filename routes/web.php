<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function() {
     return view('admin.share.master');
});


Route::group(['prefix' => '/admin' ], function(){

    Route::get('/page', function() {
        return view('admin.share.master');
    });
    // Route::get('/page', [\App\Http\Controllers\CategoryController::class, 'viewAdmin']);
    Route::group(['prefix' => '/category' ], function(){
        Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create']);
        Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store']);
        Route::get('/index', [\App\Http\Controllers\CategoryController::class, 'index']);
        Route::get('/update-isview/{id}', [\App\Http\Controllers\CategoryController::class, 'updateIsview']);
        Route::get('/delete-only/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy_only']);
        Route::get('/delete-all/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy_all']);
        Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
        Route::post('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
});
    Route::group(['prefix' => '/product' ], function(){
        Route::get('/create', [\App\Http\Controllers\ProductController::class, 'create']);
        Route::post('/create', [\App\Http\Controllers\ProductController::class, 'store']);
        Route::get('/index', [\App\Http\Controllers\ProductController::class, 'index']);
        Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
        Route::post('/changeView', [\App\Http\Controllers\ProductController::class, 'changeValueView'])->name('change.View');
        Route::get('/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
        Route::post('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
    });
    Route::group(['prefix' => '/brand' ], function(){
        Route::get('/create', [\App\Http\Controllers\BrandController::class, 'create']);
        Route::post('/create', [\App\Http\Controllers\BrandController::class, 'store']);
        Route::get('/index', [\App\Http\Controllers\BrandController::class, 'index']);
        Route::get('/delete_all/{id}', [\App\Http\Controllers\BrandController::class, 'destroyAll']);
        Route::get('/update_isview/{id}', [\App\Http\Controllers\BrandController::class, 'updateIsview']);
        Route::get('/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
        Route::post('/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);

    });
    Route::group(['prefix' => '/banner' ], function(){
        Route::get('/create', [\App\Http\Controllers\BannerController::class, 'create']);
        Route::post('/create', [\App\Http\Controllers\BannerController::class, 'store']);

    });
    Route::get('/profile', [\App\Http\Controllers\InfoAdminController::class, 'index']);
});



Route::get('/admin/register', [\App\Http\Controllers\AdminController::class, 'viewRegister']);
Route::post('/admin/register', [\App\Http\Controllers\AdminController::class, 'register'])->name('adminRegister');
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);
Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('adminLogin');
Route::get('/admin/forget', [\App\Http\Controllers\AdminController::class, 'viewForget']);
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
Route::get('/admin/verify', [\App\Http\Controllers\AdminController::class, 'verify']);

Route::get('/admin/manage', [\App\Http\Controllers\ManageController::class, 'index']);
Route::post('/admin/manage/create', [\App\Http\Controllers\ManageController::class, 'store']);


    Route::get('/client/index', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/client/error', [\App\Http\Controllers\HomeController::class, 'error']);
    Route::get('/client/profile', [\App\Http\Controllers\HomeController::class, 'profile']);
    Route::get('/client/detail', [\App\Http\Controllers\HomeController::class, 'detail']);
    Route::get('/client/category', [\App\Http\Controllers\HomeController::class, 'cate']);
    Route::get('/client/checkout', [\App\Http\Controllers\HomeController::class, 'checkout']);


