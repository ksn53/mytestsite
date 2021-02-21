<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequestValidate;

class Comments extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('can:update,post')->except(['show', 'store', 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequestValidate $request, Post $post)
    {
        $validated = $request->validated();
        $validated['owner_id'] = Auth::id();
        $validated['post_id'] = $post->id;
        $post->comments()->save(Comment::create($validated));
        flash('Комментарий добавлен.');
        return redirect(route('mainpage'));
    }
}
