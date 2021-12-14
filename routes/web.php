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
Route::get('/admin/category/create', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/admin/category/create', [\App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/admin/category/index', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/admin/category/update-isview/{id}', [\App\Http\Controllers\CategoryController::class, 'updateIsview']);
Route::get('/admin/category/delete-only/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy_only']);
Route::get('/admin/category/delete-all/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy_all']);
Route::get('/admin/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('/admin/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);



Route::get('/admin/product/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/admin/product/create', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/admin/product/index', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/admin/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::get('/admin/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
Route::post('/changeView', [\App\Http\Controllers\ProductController::class, 'changeValueView'])->name('change.View');
Route::get('/admin/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/admin/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
