<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;



Route::controller(RolePermissionController::class)->prefix('/admin')->group(
    // ['middleware' => 'admin']
 function () {
            Route::post('/assign/role/to/permissions',  'assignRoleToPermissions');
        Route::delete('/revoke/role/from/permissions',  'revokeRoleFromPermissions');
        Route::get('/showAll/rolesWithPermissions',  'showAllRolesWithPermissions');

});
