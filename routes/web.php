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
Route::get('admin/users/edit-user/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/update-user/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/delete-user/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');