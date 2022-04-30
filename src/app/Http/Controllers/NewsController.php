<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequestValidate;
use App\Http\Requests\CommentRequestValidate;
use Illuminate\Support\Facades\Auth;
use App\Http\Service\CommentAdd;
use App\Http\Service\TagExtract;

class NewsController extends Controller
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
        return view ('newsAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequestValidate $request, TagExtract $tagExtract)
    {
        $validated = $request->validated();
        $validated['owner_id'] = Auth::id();
        $news = News::create($validated);
        if (!is_null($validated['tags'])) {
            $news->tags()->sync($tagExtract->extractTagsId($validated['tags']));
        }
        flash('Новость успешно создана.');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view ('newsEdit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(News $news, NewsRequestValidate $request, TagExtract $tagExtract)
    {
        $validated = $request->validated();
        $news->update($validated);
        $news->tags()->sync($tagExtract->extractTagsId($validated['tags'], $news));
        flash('Новость успешно обновлена.');
        return redirect(route('news.edit', ['news' => $news->slug]));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        $news->delete();
        flash('Новость удалена', 'warning');
        if ($request->editmode) {
            return redirect(route('admin.news.list'));
        }
        return back();
    }
    public function storeNewsComment(CommentRequestValidate $request, News $item, CommentAdd $commentadd)
    {
        return $commentadd->storeComment($request, $item);
    }
}
