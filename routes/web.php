<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('tutorial/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);
Route::resource('comment', CommentController::class);

Route::group([
    'prefix'     => 'admin',
    'middleware' => 'auth','isAdmin'
], function () {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingsController::class);
});
