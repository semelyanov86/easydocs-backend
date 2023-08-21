<?php

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

Route::post('/v1/user/login', [\App\Http\Controllers\UserController::class, 'login']);

Route::middleware('auth:sanctum')->get('/v1/user/me', [\App\Http\Controllers\UserController::class, 'me']);

Route::middleware('auth:sanctum')->prefix('/v1')->group(function () {
    Route::get('/user/logout', [\App\Http\Controllers\UserController::class, 'logout']);

    Route::get('/groups', [\App\Http\Controllers\GroupController::class, 'index']);
    Route::get('/groups/{id}', [\App\Http\Controllers\GroupController::class, 'show']);
});
