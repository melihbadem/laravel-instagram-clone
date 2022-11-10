<?php

use App\Http\Controllers\{AuthController, UserProfileController, PostController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    //Logout request
    Route::post('/logout', [AuthController::class, 'logout']);

    //Profile requests
    Route::post('/edit-profile', [UserProfileController::class, 'editProfile']);
    Route::post('/change-password', [UserProfileController::class, 'changePassword']);
    Route::post('/get-profile-info', [UserProfileController::class, 'getProfileInfo']);

    //Post request
    Route::post('/share', [PostController::class, 'addNewPost']);
});
