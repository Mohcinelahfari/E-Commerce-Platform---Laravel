<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[StoreController::class,'index'])->name('homepage');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



Route::middleware(['admin'])->group(function () {
    Route::resource('products',ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin_dashboard');
});


Route::middleware(['editor'])->group(function () {

    Route::get('/editor/dashboard', function () {
        return 'hi editor';
    })->name('editor_dashboard');
});

require __DIR__.'/auth.php';
