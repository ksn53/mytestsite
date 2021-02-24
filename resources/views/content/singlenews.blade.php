<div class="blog-post">
<h2 class="blog-post-title">{{ $news->title }}</h2>
    <p class="blog-post-meta">{{ $news->updated_at }}</p>
    {{ $news->content}}
</div>
@can('update', $news)
    @role('admin')
        <a href="{{ route('adminpanel') }}">Admin Panel</a>
    @else
        <a href="{{ route('news.edit', ['news' => $news->slug]) }}">Редактировать/удалить статью</a>
    @endrole
@endcan