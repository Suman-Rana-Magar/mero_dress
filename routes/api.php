<?php

use App\Http\Controllers\ApiControllers\ProductController;
use App\Http\Controllers\ApiControllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/products',ProductController::class);

Route::resource('/users',UserController::class);

Route::post('/login',[UserController::class,'login']);

Route::post('/users/logout',[UserController::class,'logout']);

Route::get('/users/{id}/reset-password',[UserController::class,'resetPassword']);
// Route::put('/users/{id}',[UserController::class,'update']);

// Route::get('/products',[ProductController::class,'index']);

// Route::get('/products/{id}',[ProductController::class,'show']);

// Route::post('/products',[ProductController::class,'store']);

// Route::put('/products/{id}',[ProductController::class,'update']);

// Route::delete('/products/{id}',[ProductController::class,'destroy']);

