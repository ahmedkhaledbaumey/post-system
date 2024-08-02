<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'data' =>RoleResource::collection($roles),
            'message' => "Show All Roles Successfully."
        ]);
    }


    public function create(Request $request)
    {
        $role =Role::create ([
            'name' => $request->name,
        ]);
        return response()->json([
         'message' => "Role Created Successfully."
     ]);
    }

    public function edit(string $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json([
                'message' => "Role not found."
            ], 404);
        }
           return response()->json([
            'data' =>new RoleResource($role),
            'message' => " Edit Role By Id Successfully."
        ]);
    }


    public function update(Request $request, string $id)
    {
        $role =Role::find($id);
        if (!$role) {
         return response()->json([
             'message' => "Role not found."
         ], 404);
     }
        $role->update([
         'name' => $request->name,
         ]);

        return response()->json([
         'message' => " Update Role By Id Successfully."
     ]);
    }


    public function destroy(string $id)
    {
        $role =Role::find($id);
    if (!$role) {
        return response()->json([
            'message' => "Role not found."
        ], 404);
    }

    $role->delete($id);
    return response()->json([
        'message' => " Delete Role By Id Successfully."
    ]);
    }
}
