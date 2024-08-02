<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;



Route::controller(PermissionController::class)->prefix('/admin')->group(
    // ['middleware' => 'admin']
 function () {

Route::get('/showAll/permission','index');
Route::post('/create/permission', 'create');
Route::get('/edit/permission/{id}','edit');
Route::post('/update/permission/{id}', 'update');
Route::delete('/delete/permission/{id}', 'destroy');
});
