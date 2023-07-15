<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = \Cache::tags(['posts', 'tags'])->remember('posts_mainpage', 3600, function(){
            return Post::with('tags')->where('published', 1)->latest()->simplePaginate(10);
        });
        $test = 'test_STRING';
        return view ('main', compact('posts', 'test'));
    }
}
