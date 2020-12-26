<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

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
        $validated = $request->validate(['title' => 'required|min:5|max:100', 'slug' => 'required|unique:posts|alpha_dash','brief' => 'required|max:512', 'content' => 'required']);
        if ($request->published == "on") {
            $validated['published'] = 1;
        }
        $post = Post::create($validated);


        $post->save();
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
        $post->save();
        return redirect(route('mainpage'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('mainpage'));
    }
}
