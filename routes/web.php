<?php

use App\Http\Controllers\Firebase\DashboardController;
use App\Http\Controllers\Firebase\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('admin/users/add-user', [UserController::class, 'create'])->name('admin.users.add');
Route::post('admin/users/add-user', [UserController::class, 'store'])->name('admin.users.store');
