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
        $validated = $request->validate(['title' => 'required|min:5|max:100', 'slug' => 'required|unique:posts|alpha_dash','brief' => 'required|max:255', 'content' => 'required']);
        if ($request->published == "on") {
            $validated['published'] = 1;
        }
        $post = Post::create($validated);


        $post->save();
        return redirect(route('mainpage'));
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
