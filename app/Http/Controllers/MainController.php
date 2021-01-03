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
        $posts = Post::with('tags')->where('published', 1)->latest()->get();
        //dump($posts);
        return view ('main', compact('posts'));
        //orderBy('updated_at', 'desc')
    }
}
