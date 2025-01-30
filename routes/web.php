<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin', [DashboardController::class,'index'])->name('admin_dashboard')->middleware('auth');
Route::get('admin/login', [AuthController::class,'showLoginForm'])->name('admin.loginForm');
Route::post('admin/login', [AuthController::class,'authenticate'])->name('admin.authenticate');
Route::post('admin/logout', [AuthController::class,'logout'])->name('admin.logout');

Route::resource('admin/users', UserController::class);
