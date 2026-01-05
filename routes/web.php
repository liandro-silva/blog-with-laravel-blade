<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::view('/about', 'about');
Route::resource('post', controller: PostController::class);
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');

    Route::get('/create', [AuthController::class, 'create'])->name('auth.create');
    Route::post('/create', [AuthController::class, 'signup'])->name('auth.signup');

    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
});