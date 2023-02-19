<?php

use App\Actions\UpdatePassword;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/profile', [UserProfileController::class, 'show'])->name('view.profile');

Route::post('user/profile', UpdatePassword::class)->name('update.profile');
