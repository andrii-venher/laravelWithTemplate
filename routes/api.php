<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('posts', [\App\Http\Controllers\Api\ApiPostController::class, 'index']);
Route::post('posts', [\App\Http\Controllers\Api\ApiPostController::class, 'store']);
Route::put('posts/{id}', [\App\Http\Controllers\Api\ApiPostController::class, 'update']);
Route::delete('posts/{id}', [\App\Http\Controllers\Api\ApiPostController::class, 'destroy']);

Route::get('authors', [\App\Http\Controllers\Api\ApiAuthorController::class, 'index']);
Route::post('authors', [\App\Http\Controllers\Api\ApiAuthorController::class, 'store']);
Route::put('authors/{id}', [\App\Http\Controllers\Api\ApiAuthorController::class, 'update']);
Route::delete('authors/{id}', [\App\Http\Controllers\Api\ApiAuthorController::class, 'destroy']);
