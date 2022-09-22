<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category', [CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('category.index');

Route::post('/category', [CategoryController::class,'store'])->middleware(['auth', 'verified'])->name('category.store');

Route::get('/category/create', function () {
    return Inertia::render('Category/Create');
})->middleware(['auth', 'verified'])->name('category.create');

Route::get('/category/{category}/edit', [CategoryController::class,'edit'])->middleware(['auth', 'verified'])->name('category.edit');

Route::get('product/productbycategory/{category}', [ProductController::class,'productsbycategory'])->name('product.productbycategory');

Route::delete('product/{product}', [ProductController::class,'destroy'])->name('product.destroy');

require __DIR__.'/auth.php';
