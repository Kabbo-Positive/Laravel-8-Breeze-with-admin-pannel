<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //All Category
    Route::get('/all-category', [CategoryController::class, 'index'])->name('all_category');
    Route::get('/add-category', [CategoryController::class, 'add'])->name('add_category');
    Route::post('/insert-category', [CategoryController::class, 'insert'])->name('insert_category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit_category')->where('id', '[0-9]+');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update_category')->where('id', '[0-9]+');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete_category')->where('id', '[0-9]+');

    //All Product
    Route::get('/all-product', [ProductController::class, 'index'])->name('all_product');
    Route::get('/add-product', [ProductController::class, 'add'])->name('add_product');
    Route::post('/insert-product', [ProductController::class, 'insert'])->name('insert_product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit_product')->where('id', '[0-9]+');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update_product')->where('id', '[0-9]+');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete_product')->where('id', '[0-9]+');

    //All Contacts
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/search', [ContactController::class, 'search'])->name('search');
    Route::get('/delete-contact/{id}', [ContactController::class, 'delete'])->name('delete_contact')->where('id', '[0-9]+');
});

require __DIR__.'/auth.php';
