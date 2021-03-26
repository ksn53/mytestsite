<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \Cache::tags(['posts', 'tags'])->remember('posts_mainpage', 3600, function(){
            return Post::with('tags')->where('published', 1)->latest()->simplePaginate(10);
        });
        return view ('main', compact('posts'));
    }
}
