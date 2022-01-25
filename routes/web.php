<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
        Route::get('/delete-only/{id}', [\App\Http\Controllers\BrandController::class, 'destroyOnly']);
        Route::get('/delete_all/{id}', [\App\Http\Controllers\BrandController::class, 'destroyAll']);
        Route::get('/update_isview/{id}', [\App\Http\Controllers\BrandController::class, 'updateIsview']);
        Route::get('/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
        Route::post('/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);

    });
    Route::get('/storage/index', [\App\Http\Controllers\StorageController::class, 'index']);

    Route::group(['prefix' => '/banner' ], function(){
        // Route::get('/create', [\App\Http\Controllers\BannerController::class, 'create']);
        // Route::post('/create', [\App\Http\Controllers\BannerController::class, 'store']);
        // Route::post('/create', [\App\Http\Controllers\BannerController::class, 'store']);

        Route::get('/create', [\App\Http\Controllers\MainBannerController::class, 'create']);
        Route::post('/createMain', [\App\Http\Controllers\MainBannerController::class, 'storeMain']);
        Route::post('/createSub', [\App\Http\Controllers\MainBannerController::class, 'storeSub']);

        Route::post('/update_isview', [\App\Http\Controllers\MainBannerController::class, 'updateIsview'])->name('updateIsView');
        Route::post('/update_isview1', [\App\Http\Controllers\MainBannerController::class, 'updateIsview1'])->name('updateIsView1');
        Route::post('/update_isview2', [\App\Http\Controllers\MainBannerController::class, 'updateIsview2'])->name('updateIsView2');
        Route::post('/update_isview3', [\App\Http\Controllers\MainBannerController::class, 'updateIsview3'])->name('updateIsView3');

        Route::get('/delete/{id}', [\App\Http\Controllers\MainBannerController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\MainBannerController::class, 'edit']);
        Route::post('/update/{id}', [\App\Http\Controllers\MainBannerController::class, 'update']);
        Route::post('/updateSub/{id}', [\App\Http\Controllers\MainBannerController::class, 'updateSub']);

        Route::get('/editSub/{id}', [\App\Http\Controllers\MainBannerController::class, 'editSub']);



        Route::get('/index', [\App\Http\Controllers\MainBannerController::class, 'index']);



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
Route::get('/admin/reset', [\App\Http\Controllers\AdminController::class, 'reset']);
// Route::get('/password', [\App\Http\Controllers\AdminController::class, 'updatePassword']);
Route::post('/password', [\App\Http\Controllers\AdminController::class, 'saveUpdatePassword']);

Route::get('/admin/manage', [\App\Http\Controllers\ManageController::class, 'index']);
Route::post('/admin/manage/create', [\App\Http\Controllers\ManageController::class, 'store']);

Route::group(['middleware' => 'CheckUser'], function() {

    // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });
 Route::get('/client/index', [\App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/client/error', [\App\Http\Controllers\HomeController::class, 'error']);
    Route::get('/client/profile', [\App\Http\Controllers\HomeController::class, 'profile']);

    Route::get('/client/detail/{slug}', [\App\Http\Controllers\HomeController::class, 'detail']);
    Route::get('/client/category', [\App\Http\Controllers\HomeController::class, 'cate']);
    Route::get('/client/checkout', [\App\Http\Controllers\HomeController::class, 'checkout']);
    Route::get('/client/shopCate/{slug}', [\App\Http\Controllers\HomeController::class, 'shopCate']);
    Route::get('/client/shopBrand/{slug}', [\App\Http\Controllers\HomeController::class, 'shopBrand']);

    Route::get('/client/view-cart', [\App\Http\Controllers\HomeController::class, 'viewCart']);
    Route::get('/client/cart', [\App\Http\Controllers\HomeController::class, 'cart']);
    Route::post('/client/cart/editQty', [\App\Http\Controllers\HomeController::class, 'editQty']);

    Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store']);
    Route::get('/cart/delete/{id}', [\App\Http\Controllers\CartController::class, 'destroy']);

    Route::post('/cart/address', [\App\Http\Controllers\CartController::class, 'address']);

    Route::get('/wishlist-view', [\App\Http\Controllers\HomeController::class, 'viewWish']);
    Route::post('/wishlist', [\App\Http\Controllers\HomeController::class, 'wishList']);
    Route::get('/wishlist/delete/{id}', [\App\Http\Controllers\HomeController::class, 'destroyWish']);



    Route::group([], function() {
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'viewRegister']);
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);

    Route::get('/login', [\App\Http\Controllers\UserController::class, 'viewLogin']);
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');

    Route::get('/forget', [\App\Http\Controllers\UserController::class, 'viewForget']);
    Route::post('/forget', [\App\Http\Controllers\UserController::class, 'forget'])->name('sendReset');

    Route::get('/update-new-pass', [\App\Http\Controllers\UserController::class, 'updateNewPass']);
    Route::post('/reset-new-pass', [\App\Http\Controllers\UserController::class, 'ResetPass']);

    Route::get('/change-pass', [\App\Http\Controllers\UserController::class, 'viewChange']);
    Route::post('/change-pass', [\App\Http\Controllers\UserController::class, 'changePass'])->name('changePass');

    Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/reset', [\App\Http\Controllers\UserController::class, 'reset']);
    Route::get('/active/{xxx}', [\App\Http\Controllers\UserController::class, 'Active']);


    });



