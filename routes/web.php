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


//Authentication Admin Dashboard
Route::get('admin', [DashboardController::class,'index'])->name('admin_dashboard')->middleware('auth');
Route::get('admin/login', [AuthController::class,'showLoginForm'])->name('admin.loginForm');
Route::post('admin/login', [AuthController::class,'authenticate'])->name('admin.authenticate');
Route::post('admin/logout', [AuthController::class,'logout'])->name('admin.logout');



//Users Management Section in Dashboard
Route::get('admin/users',[UserController::class,'index'])->name('admin.users');
Route::get('users/{user}', [UserController::class, 'show'])->name('show_user');
Route::get('create-user',[UserController::class,'create'])->name('create_user');
Route::post('store-user',[UserController::class,'store'])->name('store_user');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('edit_user');
Route::put('users/{user}', [UserController::class, 'update'])->name('update_user');
Route::delete('admin/users/{user}',[UserController::class,'delete'])->name('delete_user');
///////////////////////////////////////////////////////////////////////////////////


// Route::get('create-user-child',[UserController::class,'create_user_child'])->name('create_user_child');

 
