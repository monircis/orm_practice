<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;
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
//G:\xampp\htdocs\orm>php artisan make:model Post --migration

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);

Route::post('/store', [UserController::class, 'store']);

Route::get('/user/delete/{id}', [UserController::class, 'delete']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::post('/post/store', [PostController::class, 'store']);
Route::get('/user-detail', [PostController::class, 'user_detail']);
