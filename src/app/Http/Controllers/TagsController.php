<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->with('tags')->get();
        $news = $tag->news()->with('tags')->get();
        return view ('tagebleItems', compact('posts', 'news'));
    }

}
