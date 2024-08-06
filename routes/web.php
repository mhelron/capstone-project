<?php

use App\Http\Controllers\Firebase\DashboardController;
use App\Http\Controllers\Firebase\FoodController;
use App\Http\Controllers\Firebase\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('admin/dashboard', DashboardController::class)->name('admin.dashboard');

// Users
Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('admin/users/add-user', [UserController::class, 'create'])->name('admin.users.add');
Route::post('admin/users/add-user', [UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/edit-user/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/update-user/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/delete-user/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

// Food
Route::get('admin/food', [FoodController::class, 'index'])->name('admin.food');
Route::get('admin/food/add-food', [FoodController::class, 'create'])->name('admin.food.add');
Route::post('admin/food/add-food', [FoodController::class, 'store'])->name('admin.food.store');
Route::get('admin/food/edit-food/{id}', [FoodController::class, 'edit'])->name('admin.food.edit');
Route::put('admin/food/update-food/{id}', [FoodController::class, 'update'])->name('admin.food.update');
Route::get('admin/food/delete-food/{id}', [FoodController::class, 'destroy'])->name('admin.food.delete');