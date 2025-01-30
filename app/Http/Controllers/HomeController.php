<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::published()->featured()->latest('published_at')->take(3)->get();
        $latestPosts = Post::published()->latest('published_at')->take(9)->get();

        return view('home', compact('posts', 'latestPosts'));
    }
}
