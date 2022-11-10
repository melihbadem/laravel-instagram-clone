<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InertiaPagesController;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('/', fn() => Inertia::render('Auth/Login'))->name('home');

    Route::get('/register', fn() => Inertia::render('Auth/Register'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [InertiaPagesController::class, 'index']);

    Route::get('/home', [InertiaPagesController::class, 'viewHomepage']);

    Route::get('/edit-profile', fn() => \inertia('Settings/EditProfile', ['route' => Route::current()]));

    Route::get('/change-password', fn() => \inertia('Settings/ChangePassword', ['route' => Route::current()]));
});
