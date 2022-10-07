<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user-list', [UserController::class, 'userList'])->middleware(['auth', 'verified'])->name('user-list');
Route::get('/user-add', [UserController::class, 'addUser'])->name('user-add');
Route::get('/user-edit/{id}', [UserController::class, 'editUser'])->name('user-edit');
Route::get('/user-delete/{id}', [UserController::class, 'deleteUser'])->name('user-delete');
Route::post('/user-add', [UserController::class, 'saveUser'])->name('user-save');
Route::post('/user-update', [UserController::class, 'updateUser'])->name('user-update');

Route::get('/product-list', [ProductController::class, 'productList'])->middleware(['auth', 'verified'])->name('product-list');
Route::get('/product-add', [ProductController::class, 'addProduct'])->name('product-add');
Route::get('/product-edit/{id}', [ProductController::class, 'editProduct'])->name('product-edit');
Route::get('/product-delete/{id}', [ProductController::class, 'deleteProduct'])->name('product-delete');
Route::post('/product-add', [ProductController::class, 'saveProduct'])->name('product-save');
Route::post('/product-update', [ProductController::class, 'updateProduct'])->name('product-update');