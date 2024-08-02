<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminAuthController;

Route::group([
    
    'prefix' => 'admin'
], function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);
    Route::post('/refresh', [AdminAuthController::class, 'refresh']);
    Route::get('/user-profile', [AdminAuthController::class, 'userProfile']);
});
