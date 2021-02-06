<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostUpdated;
use App\Http\Service\TagExtract;
use App\Http\Requests\PostRequestValidate;

class Posts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('can:update,post')->except(['show', 'store', 'create']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('postAdd');
    }

    public function edit(Post $post)
    {
        return view ('postEdit', compact('post'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequestValidate $request)
    {
        $validated = $request->validated();
        $validated['owner_id'] = Auth::id();
        $post = Post::create($validated);

        if (!is_null(request('tags'))) {
            $post->tags()->sync(app(TagExtract::class)->extractTagsId(request('tags')));
        }

        flash('Статья успешно создана.');
        return redirect(route('mainpage'));
    }
    public function update(Post $post, PostRequestValidate $request)
    {
        $validated = $request->validated();
        $post->update($validated);
        $post->tags()->sync(app(TagExtract::class)->extractTagsId(request('tags'), $post));
        $post->owner->notify(new PostUpdated());
        flash('Статья успешно обновлена.');
        return back();
    }

    public function show(Post $post)
    {
        return view ('post', compact('post'));
    }

    public function destroy(Post $post, Request $request)
    {
        $post->delete();
        flash('Статья удалена', 'warning');
        if ($request->adminmode) {
            return back();
        }
        return redirect(route('mainpage'));
    }
}
