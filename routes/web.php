<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;


// --- GENERAL PAGES ---
Route::get('/', function () {
    $recentsPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
    $posts = Post::paginate(10);
    return view('index', ['recentsPosts' => $recentsPosts, 'posts' => $posts]);
});

Route::get('/about', function () {
    return view('about');
});

// --- POST PAGES ---

Route::get('/post/create', fn () => view('post.create'));

Route::get('/post/{slug}/edit', function ($slug) {
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('post.edit', ['post' => $post]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post.show', ['post' => $post]);
});

Route::post('/post', function () {
    $keywords = [
        'technology', 'business', 'design', 'coding', 'workspace',
        'meeting', 'team', 'startup', 'innovation', 'development',
        'laptop', 'office', 'creative', 'work', 'collaboration',
    ];

    $keyword = fake()->randomElement($keywords);
    $width = fake()->randomElement([400, 600, 800]);
    $height = fake()->randomElement([300, 400, 500]);

    $imageUrl = "https://picsum.photos/{$width}/{$height}?{$keyword}";

    request()->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'tags' => 'required|string|max:255',
        'content' => 'required|string',
    ]);


    $post = Post::create([
        'title' => request('title'),
        'slug' => request('slug'),
        'image' => $imageUrl,
        'tags' => request('tags'),
        'content' => request('content'),
    ]);

    if ($post) {
        return redirect('/');
    } else {
        return redirect('/post/create')->with('error', 'Failed to create post');
    }
});

Route::put('/post/{post:slug}', function (Post $post) {
    request()->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'tags' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post->update([
        'title' => request('title'),
        'slug' => request('slug'),
        'tags' => request('tags'),
        'content' => request('content'),
    ]);
    
    return redirect('/post/' . $post->slug)->with('success', 'Post updated successfully');

});

Route::delete('/post/{post:slug}', function (Post $post) {
    $post->delete();
    return redirect('/')->with('success', 'Post deleted successfully');
});