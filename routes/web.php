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


Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'shop']);

Route::get('/product/{id}/', [App\Http\Controllers\Admin\ProductController::class, 'showShopProduct'])->name('single.product');


Route::resource('admin/products',App\Http\Controllers\Admin\ProductController::class)->middleware('auth');

Route::get('/category/{category}', [App\Http\Controllers\Admin\ProductController::class, 'findCategory'])->name('category.find');

Route::get('/search', [App\Http\Controllers\Admin\ProductController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('home');
