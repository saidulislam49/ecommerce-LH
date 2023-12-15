<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home');
    Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
});
