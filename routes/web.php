<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog-details', [HomeController::class, 'blogDetails']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/doctors', [HomeController::class, 'doctors']);

Route::get('/admin/posts', [PostController::class, 'index']);
Route::get('/admin/posts/create', [PostController::class, 'create']);
Route::post('/admin/posts/store', [PostController::class, 'store']);
Route::get('/admin/posts/update/{id}', [PostController::class, 'update']);
Route::put('/admin/posts/storeUpdate', [PostController::class, 'storeUpdate']);
Route::delete('/admin/posts/delete/{id}', [PostController::class, 'delete']);

Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::get('/admin/categories/create', [CategoryController::class, 'create']);
Route::post('/admin/categories', [CategoryController::class, 'store']);
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/admin/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy']);