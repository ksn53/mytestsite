<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostUpdated;

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
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $validated = $request->validate(['title' => 'required|min:5|max:100', 'slug' => 'required|unique:posts|alpha_dash','brief' => 'required|max:512', 'content' => 'required']);
        if ($request->published == "on") {
            $validated['published'] = 1;
        }
        $validated['owner_id'] = Auth::id();
        $post = Post::create($validated);
        $post->tags()->sync($syncIds);
        $post->save();
        flash('Статья успешно создана.');
        return redirect(route('mainpage'));
    }

    public function show(Post $post)
    {
        return view ('post', compact('post'));
    }

    public function edit(Post $post)
    {
        return view ('postEdit', compact('post'));
    }
    public function update(Post $post)
    {
        $validated = request()->validate(['title' => 'required|min:5|max:100', 'slug' => 'required|alpha_dash','brief' => 'required|max:512', 'content' => 'required']);
        $validated['published'] = null;
        if (request()->published == "on") {
            $validated['published'] = 1;
        }
        $validated['owner_id'] = Auth::id();
        $post->update($validated);

        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });
        $syncIds = $postTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($postTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $post->tags()->sync($syncIds);
        $post->owner->notify(new PostUpdated());
        $post->save();
        flash('Статья успешно обновлена.');
        return redirect(route('mainpage'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        flash('Статья удалена', 'warning');
        return redirect(route('mainpage'));
    }
}
