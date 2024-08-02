<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UserProfileUpdateOrCreateRequest;

class UserProfileController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = request()->user()->update([
            'password'=> bcrypt($request->new_password)
        ]);
        return response()->json(['message' => 'Password changed successfully.']);
    }

    public function updateProfile(UserProfileUpdateOrCreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user(); 

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store(UserProfile::storageFolder);
        }

        if ($request->hasFile('cover_photo')) {
            $data['cover_photo'] = $request->file('cover_photo')->store(UserProfile::storageFolder);
        }

        // Create or update the user profile
        $profile = $user->userProfile()->updateOrCreate([], $data);

        return response()->json([
            'message' => 'User profile updated successfully',
            // 'data' => $profile
        ]);
    }
    public function updateAccount(UpdateAccountRequest $request)
    {
        $data = $request->validated();
        $request->user()->update($data);

        return response()->json([
            'message' => 'Account updated successfully.',
        ]);
    }
}