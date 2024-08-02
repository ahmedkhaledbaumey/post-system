<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\UserProfileController;

 Route::controller(UserProfileController::class)->middleware('auth:api')->prefix('/user')->group(function () {
    Route::post('/updateProfile', 'updateProfile');
    Route::post('/upadteAccount',  'updateAccount');
    Route::post('/changePassword',  'changePassword');
});