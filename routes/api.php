<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\DetectionController;
use App\Http\Controllers\Api\V1\DonationController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
        Route::post('user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('user');
    });

    Route::get('activities', DetectionController::class)->name('activities');
    Route::post('donate', DonationController::class)->name('donate');
    Route::post('detect', DetectionController::class)->name('detect');
});
