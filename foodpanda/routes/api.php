<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GirlfriendController;
use App\Http\Controllers\PersonalController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/food', [FoodController::class, 'index']);
Route::post('food', [FoodController::class, 'store']);
Route::get('/food/{id}', [FoodController::class, 'show']);
Route::put('/food/{id}', [FoodController::class, 'update']);
Route::delete('/food/{id}', [FoodController::class, 'destroy']);

// For Delivery
Route::get('/delivery', [DeliveryController::class, 'index']);
Route::post('/delivery', [DeliveryController::class, 'store']);
Route::get('/delivery/{id}', [DeliveryController::class, 'show']);
Route::put('/delivery/{id}', [DeliveryController::class, 'update']);
Route::delete('/delivery/{id}', [DeliveryController::class, 'destroy']);

// For Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::put('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);

// For Post
Route::get('/post', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::put('/post/{id}', [PostController::class, 'update']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

// Girlfriend

Route::get('/girlfriend', [GirlfriendController::class, 'index']);
Route::post('/girlfriend', [GirlfriendController::class, 'store']);
Route::get('/girlfriend/{id}', [GirlfriendController::class, 'show']);
Route::put('/girlfriend/{id}', [GirlfriendController::class, 'update']);
Route::delete('/girlfriend/{id}', [GirlfriendController::class, 'destroy']);

// Person
Route::get('/person', [PersonalController::class, 'index']);
Route::post('/person', [PersonalController::class, 'store']);
Route::get('/person/{id}', [PersonalController::class, 'show']);
Route::put('/person/{id}', [PersonalController::class, 'update']);
Route::delete('/person/{id}', [PersonalController::class, 'destroy']);