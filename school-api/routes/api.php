<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

// Student Route

Route::get('/signup', [UserController::class, 'index']);
// Route::get('/signout', [UserController::class, 'index']);
// Sign out
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);




// Student public route
Route::get('/students', [StudentController::class ,'index']);
Route::get('/students/{id}', [StudentController::class ,'show']);

// Student private route
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/students', [StudentController::class ,'store']);
    Route::put('/students/{id}', [StudentController::class ,'update']);
    Route::delete('/students/{id}', [StudentController::class ,'destroy']);

    // Sign out
    Route::post('/signout', [UserController::class, 'signout']);
});




