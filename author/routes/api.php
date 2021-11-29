<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;

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

// PUBLIC ROUTE

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function()
{
    // Post
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::post('/post', [PostController::class, 'store']);
    Route::put('/post/{id}', [PostController::class, 'store']);
    Route::delete('/post/{id}', [PostController::class, 'store']);

    // User
    Route::post('/logout', [UserController::class, 'logout']);
});

//  Todo
Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'show']);
Route::post('/todos', [TodoController::class, 'store']);
Route::put('/todos/{id}', [TodoController::class, 'store']);
Route::delete('/todos/{id}', [TodoController::class, 'store']);
Route::get('/todos/search/{title}', [TodoController::class, 'search']);