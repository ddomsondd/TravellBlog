<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('categories', [App\Http\Controllers\Admin\DashboardController::class, 'categories'])->name('admin.categories');
    Route::get('users', [App\Http\Controllers\Admin\DashboardController::class, 'users'])->name('admin.users');
    Route::delete('/delete-user/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'destroy_user'])->name('delete-user');
    Route::put('/change-user-role/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'change_user_role'])->name('change-user-role');
    Route::delete('/delete-category/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'deleteCategory'])->name('delete-category');
    Route::post('/add-category', [App\Http\Controllers\Admin\DashboardController::class, 'addCategory'])->name('add-category');
});

Route::prefix('home')->middleware(['auth'])->group(function (){
    Route::put('/update-bio', [App\Http\Controllers\HomeController::class, 'updateBio'])->name('update-bio');
    Route::put('/update-photo-bio', [App\Http\Controllers\HomeController::class, 'updatePhotoBio'])->name('update-photo-bio');
}); 


/*
Route::prefix('post')->middleware(['auth'])->group(function (){
    Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('add-post', [App\Http\Controllers\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('posts{id}', [App\Http\Controllers\PostController::class, 'edit']);
    Route::put('update-post{id}', [App\Http\Controllers\PostController::class, 'update']);
    Route::delete('delete-post{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete-post');

    
    Route::post('like/{id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like');
    Route::post('unlike/{id}', [App\Http\Controllers\LikeController::class, 'unlike'])->name('unlike');

    Route::post('comment/{id}', [App\Http\Controllers\CommentController::class, 'comment'])->name('comment');
});
*/

Route::middleware(['auth'])->group(function (){
    Route::get('posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
    Route::get('add-post', [App\Http\Controllers\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\PostController::class, 'store']);
    Route::get('posts{id}', [App\Http\Controllers\PostController::class, 'edit']);
    Route::put('update-post{id}', [App\Http\Controllers\PostController::class, 'update']);
    Route::delete('delete-post{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete-post');

    Route::post('like/{id}', [App\Http\Controllers\LikeController::class, 'like'])->name('like');
    Route::post('unlike/{id}', [App\Http\Controllers\LikeController::class, 'unlike'])->name('unlike');

    Route::post('comment/{id}', [App\Http\Controllers\CommentController::class, 'comment'])->name('comment');
    Route::delete('delete-comment/{id}', [App\Http\Controllers\CommentController::class, 'destroy_comment'])->name('delete-comment');
    Route::get('/profile{userId?}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
});




