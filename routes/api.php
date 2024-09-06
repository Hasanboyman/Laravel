<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::post('/', [UserController::class,'store']);
Route::get('/', [userController::class, 'show']);
Route::get('/{id}', [userController::class, 'index'])->where('id', '[0-9]+');
Route::delete('/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+');
Route::put('/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
Route::get('/table', [UserController::class, 'userTable'])->name('table');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/create/product', [ProductController::class,'store']);
Route::get('/products', [ProductController::class, 'show']);
Route::get('/product/{id}', [ProductController::class, 'index'])->where('name', '[a-zA-Z0-9\-]+');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->where('id', '[a-zA-Z0-9\-]+');
Route::put('/product/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');
Route::get('/b', [ProductController::class, 'productTable'])->name('b');
