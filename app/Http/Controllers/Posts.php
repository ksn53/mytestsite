<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('postForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['slug' => 'required|unique:posts|alpha_dash', 'title' => 'required|min:5|max:100', 'brief' => 'required|max:255', 'content' => 'required']);
        $post = new Post();
        $post->title = $request->title;
        $post->brief = $request->brief;
        $post->content = $request->content;
        $post->slug = $request->slug;
        if ($request->published == "on") {
            $post->published = 1;
        }
        $post->save();
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('post', compact('post'));
    }
}
