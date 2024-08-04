<?php

use App\Http\Controllers\Firebase\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', DashboardController::class);
