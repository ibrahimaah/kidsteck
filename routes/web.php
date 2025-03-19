<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StoryPartController;
use App\Http\Controllers\StoryPartController as SiteStoryPartController;
use App\Http\Controllers\AuthController as SiteAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Parent\ParentDashboardController;
use App\Http\Controllers\Parent\ProposedStoryController;
use App\Http\Controllers\Admin\ProposedStoryController as AdminProposedStoryController;
use App\Http\Controllers\Volunteer\DashboardController as VolunteerDashboardController;
use App\Http\Controllers\Volunteer\ProposedStoryController as VolunteerProposedStoryController;
use App\Http\Controllers\Volunteer\VolunteerStoryController;
use App\Http\Controllers\Volunteer\VolunteerStoryPartController;
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

//////////////////////////////////////////////////////////////////////////////
//// -- Site Routes
//////////////////////////////////////////////////////////////////////////////

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.loginForm');
    Route::post('admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
});


Route::middleware('admin.auth')->group(function () {

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

    //Story Part Questions
    Route::get('admin/story-parts/{story_part_id}/question', [QuestionController::class, 'index'])->name('admin.story_parts.questions'); // List questions
    Route::get('admin/story-parts/{story_part_id}/question/create', [QuestionController::class, 'create'])->name('admin.story_parts.question.create'); // Create form
    Route::post('admin/story-parts/question/store', [QuestionController::class, 'store'])->name('admin.story_parts.question.store'); // Store new question
    Route::get('admin/story-parts/question/{id}/edit', [QuestionController::class, 'edit'])->name('admin.story_parts.question.edit'); // Edit form
    Route::put('admin/story-parts/question/{id}/update', [QuestionController::class, 'update'])->name('admin.story_parts.question.update'); // Update question
    Route::delete('admin/story-parts/question/{id}/delete', [QuestionController::class, 'destroy'])->name('admin.story_parts.question.delete'); // Delete question


    //Propose Stories
    Route::get('proposed-stories', [AdminProposedStoryController::class, 'index'])->name('admin.proposed-stories');
    Route::get('proposed-stories/{id}/show', [AdminProposedStoryController::class, 'show'])->name('admin.proposed-stories.show');
    Route::post('proposed-stories/{id}/accept', [AdminProposedStoryController::class, 'accept'])->name('admin.proposed-stories.accept');
    Route::post('proposed-stories/{id}/reject', [AdminProposedStoryController::class, 'reject'])->name('admin.proposed-stories.reject');
    Route::post('proposed-stories/{id}/delete', [AdminProposedStoryController::class, 'delete'])->name('admin.proposed-stories.delete');
});



//////////////////////////////////////////////////////////////////////////////
//// -- Site Routes
//////////////////////////////////////////////////////////////////////////////

Route::middleware('guest')->group(function () {
    Route::get('login', [SiteAuthController::class, 'showLoginForm'])->name('showLoginForm');
    Route::get('register', [SiteAuthController::class, 'showRegisterForm'])->name('showRegisterForm');
    Route::post('register', [SiteAuthController::class, 'register'])->name('register');
    Route::post('login', [SiteAuthController::class, 'login'])->name('login');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('stories', [StoryController::class, 'index'])->name('stories');
Route::get('stories/{id}', [StoryController::class, 'show'])->name('stories.show');
Route::get('stories/parts/{story_part_id}', [SiteStoryPartController::class, 'show'])->name('stories.part.show');
Route::get('stories/parts/{story_part_id}/quiz', [SiteStoryPartController::class, 'show_quiz'])->name('story_parts.quiz');

Route::middleware(['auth', 'parent'])->group(function () {
    Route::get('parent-dashboard', [ParentDashboardController::class, 'index'])->name('parent.dashboard');
    Route::get('parent-dashboard/manage-childs-accounts', [ParentDashboardController::class, 'manage_childs_accounts'])->name('parent.manage-accounts');
    Route::get('parent-dashboard/{parent_id}/create-child-account', [ParentDashboardController::class, 'create_child'])->name('parent.create_user_child');
    Route::get('parent-dashboard/edit-child-account/{user_id}',  [ParentDashboardController::class, 'edit_child'])->name('parent.edit_user_child');
    Route::post('parent-dashboard/store-child-account', [ParentDashboardController::class, 'store_child'])->name('parent.store_user_child');
    Route::put('parent-dashboard/update-child-account/{user_id}', [ParentDashboardController::class, 'update_child'])->name('parent.update_user_child');
    Route::delete('parent-dashboard/delete-child-account/{user_id}', [ParentDashboardController::class, 'remove_child'])->name('parent.remove_user_child');

    Route::get('parent-dashboard/proposed-stories', [ProposedStoryController::class, 'index'])->name('parent.proposed-stories');
    Route::get('parent-dashboard/create-proposed-story', [ProposedStoryController::class, 'create'])->name('parent.proposed_stories.create');
    Route::get('parent-dashboard/edit-proposed-story/{id}', [ProposedStoryController::class, 'edit'])->name('parent.proposed_stories.edit');
    Route::post('store-proposed-story', [ProposedStoryController::class, 'store'])->name('parent.proposed_stories.store');
    Route::post('update-proposed-story/{id}', [ProposedStoryController::class, 'update'])->name('parent.proposed_stories.update');
    Route::post('delete-proposed-story/{id}', [ProposedStoryController::class, 'delete'])->name('parent.proposed_stories.delete');

});

Route::middleware(['auth', 'volunteer'])->group(function () {

    Route::prefix('volunteer-dashboard')->name('volunteer.')->group(function () {
        Route::get('/', [VolunteerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/proposed-stories', [VolunteerProposedStoryController::class, 'index'])->name('proposed-stories');
        Route::get('/{id}/proposed-stories', [VolunteerProposedStoryController::class, 'show'])->name('proposed-stories.show');
    });
        

    Route::prefix('volunteer-dashboard/stories')->name('volunteer.stories.')->group(function () {
        Route::get('/', [VolunteerStoryController::class, 'index'])->name('index');
        Route::get('/create', [VolunteerStoryController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [VolunteerStoryController::class, 'edit'])->name('edit');
        Route::get('/{id}/show', [VolunteerStoryController::class, 'show'])->name('show');
        Route::post('/store', [VolunteerStoryController::class, 'store'])->name('store');
        Route::post('/{id}/update', [VolunteerStoryController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [VolunteerStoryController::class, 'delete'])->name('delete');
    });
    

    Route::prefix('volunteer/stories/{story_id}')->group(function () {
        Route::get('story-parts', [VolunteerStoryPartController::class, 'index'])->name('volunteer.story_parts.index');
        Route::get('create-story-part', [VolunteerStoryPartController::class, 'create'])->name('volunteer.story_parts.create');
    });
    
    Route::prefix('volunteer')->group(function () {
        Route::get('edit-story-part/{id}', [VolunteerStoryPartController::class, 'edit'])->name('volunteer.story_parts.edit');
        Route::post('store-story-part', [VolunteerStoryPartController::class, 'store'])->name('volunteer.story_parts.store');
        Route::post('update-story-part/{id}', [VolunteerStoryPartController::class, 'update'])->name('volunteer.story_parts.update');
        Route::post('delete-story-part/{id}', [VolunteerStoryPartController::class, 'delete'])->name('volunteer.story_parts.delete');
    });
});



Route::post('logout', [SiteAuthController::class, 'logout'])->name('logout')->middleware('auth');

