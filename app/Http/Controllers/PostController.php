<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Validation\Rule;
use App\Jobs\ProcessPodcast;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->get();
        // $posts = Post::firs
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
