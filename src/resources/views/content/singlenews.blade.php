<div class="blog-post">
<h2 class="blog-post-title">{{ $news->title }}</h2>
    <p class="blog-post-meta">{{ $news->updated_at }}</p>
    @include('content.tags', ['tags' => $news->tags])
    {{ $news->content}}
</div>
    <div class="container">
        @auth
            @include('commentAdd', ['item' => $news, 'route' => 'commentnews'])
        @else
            Нужно загеристрироваться, чтобы писать комментарии.
        @endauth
        <hr>
        @include('content.comments', ['comments' => $news->comments])
    </div>

@can('update', $news)
    @role('admin')
        <a href="{{ route('adminpanel') }}">Admin Panel</a>
    @else
        <a href="{{ route('news.edit', ['news' => $news->slug]) }}">Редактировать/удалить статью</a>
    @endrole
@endcan