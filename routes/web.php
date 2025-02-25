<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StoryPartController;
use App\Http\Controllers\AuthController as SiteAuthController;
use App\Http\Controllers\HomeController;
use App\Models\User;
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


Route::middleware('guest')->group(function () 
{
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.loginForm');
    Route::post('admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
});


Route::middleware('admin.auth')->group(function () 
{
    
    Route::get('admin', [DashboardController::class, 'index'])->name('admin_dashboard');
    Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    // Route::resource('admin/users', UserController::class);

    Route::get('admin/create-user-child', [UserController::class, 'create_user_child'])->name('create_user_child');
    Route::get('admin/edit-user-child/{id}', [UserController::class, 'edit_user_child'])->name('edit_user_child');
    Route::post('store-user-child', [UserController::class, 'store_user_child'])->name('store_user_child');
    Route::post('update-user-child/{id}', [UserController::class, 'update_user_child'])->name('update_user_child');
    Route::get('admin/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('store-user', [UserController::class, 'store'])->name('store_user');
    Route::get('admin/edit-user/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::put('update-user/{id}', [UserController::class, 'update'])->name('update_user');
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //Stories
    Route::get('admin/stories', [AdminStoryController::class, 'index'])->name('admin.stories');
    Route::get('admin/create-story', [AdminStoryController::class, 'create'])->name('admin.stories.create');
    Route::get('admin/edit-story/{id}', [AdminStoryController::class, 'edit'])->name('admin.stories.edit');
    Route::post('store-story', [AdminStoryController::class, 'store'])->name('admin.stories.store');
    Route::post('update-story/{id}', [AdminStoryController::class, 'update'])->name('admin.stories.update');
    Route::post('delete-story/{id}', [AdminStoryController::class, 'delete'])->name('admin.stories.delete');

    //Story Parts
    Route::get('admin/story-parts/{story_id}', [StoryPartController::class, 'index'])->name('admin.story_parts');
    Route::get('admin/create-story-part/{story_id}', [StoryPartController::class, 'create'])->name('admin.story_parts.create');
    Route::get('admin/edit-story-part/{id}', [StoryPartController::class, 'edit'])->name('admin.story_parts.edit');
    Route::post('store-story-part', [StoryPartController::class, 'store'])->name('admin.story_parts.store');
    Route::post('update-story-part/{id}', [StoryPartController::class, 'update'])->name('admin.story_parts.update');
    Route::post('delete-story-part/{id}', [StoryPartController::class, 'delete'])->name('admin.story_parts.delete');



    Route::get('admin/create-user', [UserController::class, 'create'])->name('create_user');
    Route::get('admin/create-user-by-role/{role}', [UserController::class, 'create_user_by_role'])->name('create_user_by_role');


    //////////////////////////////////////////////////////////////////////////////
    //// -- Site Routes
    //////////////////////////////////////////////////////////////////////////////
    Route::post('logout', [SiteAuthController::class, 'logout'])->name('logout');
    
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('stories', [StoryController::class, 'index'])->name('stories');


Route::middleware('guest')->group(function () 
{
    Route::get('login', [SiteAuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::get('register', [SiteAuthController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register', [SiteAuthController::class, 'register'])->name('register');
    Route::post('login', [SiteAuthController::class, 'login'])->name('login');
});
