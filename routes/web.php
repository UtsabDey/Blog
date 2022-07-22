<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group([
    'prefix'     => 'admin',
    'middleware' => 'auth','isAdmin'
], function () {
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
});
