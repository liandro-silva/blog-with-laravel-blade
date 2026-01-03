<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listAllPosts()
    {
        $recentsPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $posts = Post::paginate(10);

        return view('index', ['recentsPosts' => $recentsPosts, 'posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
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
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $post = Post::where('slug', $post->slug)->firstOrFail();

        return view('post.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
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
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')->with('success', 'Post deleted successfully');
    }
}
