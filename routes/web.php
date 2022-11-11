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

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('create-category');
Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('create-product');
Route::get('/detail/{id}', [ProductController::class, 'detailProduct'])->name('detail');
Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
