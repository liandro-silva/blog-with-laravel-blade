<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


// --- GENERAL PAGES ---
Route::get('/about', function () {
    return view('about');
});

// --- POST PAGES ---
Route::get('/', [PostController::class, 'listAllPosts']);

Route::get('/post/create', [PostController::class, 'create']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/post/{post:slug}/edit', action: [PostController::class, 'edit']);

Route::post('/post', [PostController::class, 'store']);

Route::put('/post/{post:slug}', [PostController::class, 'update']);

Route::delete('/post/{post:slug}', [PostController::class, 'destroy']);