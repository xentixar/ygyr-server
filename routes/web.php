<?php

use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\LabelController;
use App\Http\Controllers\Admin\UsageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::name('admin.')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('labels', LabelController::class);
        Route::resource('usages', UsageController::class);
        Route::resource('donations', DonationController::class);
        Route::get('warehouse', WarehouseController::class)->name('warehouse');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
