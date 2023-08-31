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

Route::middleware('auth:sanctum')->prefix('/v1')->group(function () {
    Route::get('/user/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::get('/user/me', [\App\Http\Controllers\UserController::class, 'me'])->name('user.me');
    Route::put('/user/me', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');

    Route::get('/folders', [\App\Http\Controllers\FolderController::class, 'index'])->name('folder.index');
    Route::post('/folders', [\App\Http\Controllers\FolderController::class, 'store'])->name('folder.store');
    Route::get('/folders/{id}', [\App\Http\Controllers\FolderController::class, 'show'])->name('folder.show');
    Route::put('/folders/{id}', [\App\Http\Controllers\FolderController::class, 'update'])->name('folder.update');
    Route::get('/folders/{id}/activities', [\App\Http\Controllers\FolderController::class, 'activities'])->name('folder.activities');
    Route::get('/folders/{id}/documents', [\App\Http\Controllers\DocumentController::class, 'indexFromFolder'])->name('folders.documents');

    Route::get('/documents', [\App\Http\Controllers\DocumentController::class, 'index'])->name('document.index');
    Route::post('/documents', [\App\Http\Controllers\DocumentController::class, 'store'])->name('document.store');
    Route::get('/documents/{id}', [\App\Http\Controllers\DocumentController::class, 'show'])->name('document.show');
    Route::put('/documents/{id}', [\App\Http\Controllers\DocumentController::class, 'update'])->name('document.update');
    Route::patch('/documents/{id}', [\App\Http\Controllers\DocumentController::class, 'updateSequence'])->name('document.update-sequence');
    Route::delete('/documents/{id}', [\App\Http\Controllers\DocumentController::class, 'destroy'])->name('document.destroy');

    Route::get('/groups', [\App\Http\Controllers\GroupController::class, 'index'])->name('group.index');
    Route::get('/groups/{id}', [\App\Http\Controllers\GroupController::class, 'show'])->name('group.show');
});
