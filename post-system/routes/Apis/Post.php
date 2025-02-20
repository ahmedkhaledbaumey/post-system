<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'create']);
Route::post('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'delete']);
