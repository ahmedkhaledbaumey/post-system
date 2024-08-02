<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostPhotoController;




require __DIR__ . '/Apis/AdminAuth.php';
require __DIR__ . '/Apis/UserAuth.php';
require __DIR__ . '/Apis/Post.php';
require __DIR__ . '/Apis/UserProfile.php';
require __DIR__ . '/Apis/Permissions.php';
require __DIR__ . '/Apis/RolePermissions.php';
require __DIR__ . '/Apis/Role.php';
require __DIR__ . '/Apis/Admin.php';


