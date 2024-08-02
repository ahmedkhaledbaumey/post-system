<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return response()->json([
            'data' =>PermissionResource::collection($permissions),
            'message' => "Show All Permissions Successfully."
        ]);
    }


    public function create(PermissionRequest $request)
    {
    $createdPermissions = [];

    foreach ($request->permissions as $permissionName) {
        $permission = Permission::create(['name' => $permissionName]);
        $createdPermissions[] = $permission;
    }

    return response()->json([
        'message' => 'Permissions created successfully',
    ]);
}


    public function edit(string $id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return response()->json([
                'message' => "Permission not found."
            ], 404);
        }
           return response()->json([
            'data' =>new PermissionResource($permission),
            'message' => " Edit Permission By Id Successfully."
        ]);
    }


    public function update(Request $request, string $id)
    {
        $permission =Permission::find($id);
        if (!$permission) {
         return response()->json([
             'message' => "Permission not found."
         ], 404);
     }
        $permission->update([
         'name' => $request->name,
         ]);

        return response()->json([
         'message' => " Update Permission By Id Successfully."
     ]);
    }


    public function destroy(string $id)
    {
        $permission =Permission::find($id);
    if (!$permission) {
        return response()->json([
            'message' => "Permission not found."
        ], 404);
    }

    $permission->delete($id);
    return response()->json([
        'message' => " Delete Permission By Id Successfully."
    ]);
    }
}
