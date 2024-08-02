<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AdminResource;
use App\Http\Requests\AdminRegisterRequest;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::get();
        return response()->json([
            'data' =>AdminResource::collection($admins),
            'message' => "Show All Admins Successfully."
        ]);
    }

    public function create(AdminRegisterRequest $request)
    {
        $admin =User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => $request->is_admin,
            'role_id' => $request->role_id,
        ]);
        return response()->json([
         'message' => "Admin Created Successfully."
     ]);
    }

    public function edit(string $id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return response()->json([
                'message' => "Admin not found."
            ], 404);
        }
           return response()->json([
            'data' =>new AdminResource($admin),
            'message' => " Edit Admin By Id Successfully."
        ]);
    }


    public function update(Request $request, string $id)
    {
        $admin =User::find($id);
        if (!$admin) {
         return response()->json([
             'message' => "Admin not found."
         ], 404);
     }
        $admin->update([
         'name' => $request->name,
         'email' => $request->email,
         'password' => $request->password,
         'role_id' => $request->role_id,
         'is_admin' => $request->is_admin,
         ]);

        return response()->json([
         'message' => " Update Admin By Id Successfully."
     ]);
    }


    public function destroy(string $id)
    {
        $admin =User::find($id);
    if (!$admin) {
        return response()->json([
            'message' => "Admin not found."
        ], 404);
    }

    $admin->delete($id);
    return response()->json([
        'message' => " Delete Admin By Id Successfully."
    ]);
    }
}
