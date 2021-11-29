<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoryController;

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

// Public route POST
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);

// Permission route POST
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{id}', [PostController::class, 'update']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

// Public route STORY
Route::get('/story', [StoryController::class, 'index']);
Route::get('/story/{id}', [StoryController::class, 'show']);

// Permission reout STORY
Route::post('/story', [StoryController::class, 'store']);
Route::put('/story/{id}', [StoryController::class, 'update']);
Route::delete('/story/{id}', [StoryController::class, 'destroy']);