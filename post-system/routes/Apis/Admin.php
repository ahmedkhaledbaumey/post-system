<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::controller(AdminController::class)->prefix('/admin')->group(
 function () {

Route::get('/showAll/admin','index');
Route::post('/create/admin', 'create');
Route::get('/edit/admin/{id}','edit');
Route::put('/update/admin/{id}', 'update');
Route::delete('/delete/admin/{id}', 'destroy');
});
