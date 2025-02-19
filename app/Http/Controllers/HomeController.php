<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Cache::remember('posts', Carbon::now()->addDay(), function () {
            return Post::published()->featured()->with('types')->latest('published_at')->take(12)->get();
        });

        $featuredPosts = $posts->take(3);
        $latestPosts = $posts->skip(3)->take(9);
        return view('home', compact('featuredPosts', 'latestPosts'));
    }
}
