<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;




        Route::controller(RoleController::class)->prefix('/admin')->group(
        // ['middleware' => 'admin']
     function () {

    Route::get('/showAll/role','index');
    Route::post('/create/role', 'create');
    Route::get('/edit/role/{id}','edit');
    Route::post('/update/role/{id}', 'update');
    Route::delete('/delete/role/{id}', 'destroy');
});




