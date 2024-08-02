<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\UserAuthController; 

Route::group([
    'prefix' => 'user'
], function () {
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
    Route::post('/refresh', [UserAuthController::class, 'refresh']);
    Route::get('/user-profile', [UserAuthController::class, 'userProfile']);
});