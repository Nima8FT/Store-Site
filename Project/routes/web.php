<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin;


// Admin Route
Route::prefix('admin')->namespace('Admin')->group(function () { 
    Route::get('/',[AdminDashboardController::class,'index'])->name('admin.home');
});