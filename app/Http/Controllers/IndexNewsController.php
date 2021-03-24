<?php

namespace App\Http\Controllers;

use App\Models\News;

class IndexNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = \Cache::tags(['news|list'])->remember('news_list', 3600, function(){
            return News::where('published', 1)->latest()->simplePaginate(10);
        });
        return view ('newsPage', compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = \Cache::tags(['news|' . $news->slug])->remember('news_' . $news->slug, 3600, function() use($news){
            return $news;
        });
        return view ('news', compact('news'));
    }
}
