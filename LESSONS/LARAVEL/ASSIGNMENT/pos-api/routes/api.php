<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Item  Route
Route::get('/items', [ItemController::class ,'index']);
Route::get('/items/{id}', [ItemController::class ,'show']);
Route::get('/items/search/{id}', [ItemController::class ,'search']);
Route::post('/items', [ItemController::class ,'store']);
Route::put('/items/{id}', [ItemController::class ,'update']);
Route::delete('/items/{id}', [ItemController::class ,'destroy']);

// User Route
Route::get('/users', [UserController::class ,'index']);
Route::post('/users', [UserController::class ,'store']);
Route::get('/users/{id}', [UserController::class ,'show']);
Route::put('/users/{id}', [UserController::class ,'update']);
Route::delete('/users/{id}', [UserController::class ,'destroy']);

// Profile Route
Route::get('/profile', [ProfileController::class ,'index']);
Route::post('/profile', [ProfileController::class ,'store']);
Route::get('/profile/{id}', [ProfileController::class ,'show']);
Route::put('/profile/{id}', [ProfileController::class ,'update']);
Route::delete('/profile/{id}', [ProfileController::class ,'destroy']);

// Post Route
Route::get('/posts', [PostController::class ,'index']);
Route::post('/posts', [PostController::class ,'store']);
Route::get('/posts/{id}', [PostController::class ,'show']);
Route::put('/posts/{id}', [PostController::class ,'update']);
Route::delete('/posts/{id}', [PostController::class ,'destroy']);

// Comment Route
Route::get('/comments', [CommentController::class ,'index']);
Route::post('/comments', [CommentController::class ,'store']);
Route::get('/comments/{id}', [CommentController::class ,'show']);
Route::put('/comments/{id}', [CommentController::class ,'update']);
Route::delete('/comments/{id}', [CommentController::class ,'destroy']);

// Role Route
Route::get('/roles', [RoleController::class ,'index']);
Route::post('/roles', [RoleController::class ,'store']);
Route::get('/roles/{id}', [RoleController::class ,'show']);
Route::put('/roles/{id}', [RoleController::class ,'update']);
Route::delete('/roles/{id}', [RoleController::class ,'destroy']);