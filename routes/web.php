<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
// DB::listen(function ($event) {
//     dump($event->sql);
// });


Route::get('/', function () {
    return view('welcome');
});

// Route::get('category', [CategoryController::class,'index'])->name('category.index');

// Route::resource('category', CategoryController::class)->except(['create','show','update','edit','store','destroy']);

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class,'index'])->name('category.index');
    Route::get('/summary', [CategoryController::class,'summary'])->name('category.summary');
    Route::post('/category/summaryByAjax', [CategoryController::class,'summaryByAjax'])->name('category.summaryByAjax');
    Route::get('/{category}/edit', [CategoryController::class,'edit'])->name('category.edit');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class,'index'])->name('product.index');
    Route::get('/productsbycategory/{category}', [ProductController::class,'productsbycategory'])->name('product.productsbycategory');
});


