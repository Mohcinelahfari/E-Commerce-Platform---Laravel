<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
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

Route::get('/',[StoreController::class,'index'])->name('homepage');

Route::resource('products',ProductController::class);
Route::resource('categories', CategoryController::class);
