<div class="blog-post">
<h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->content}}
</div>
<hr>
    @forelse($post->history as $item)
        <p>{{ $item->email }} {{ $item->created_at->diffForHumans() }} {{ $item->before }} {{ $item->after }}</p>
    @empty
        <p>Нет истории измеений.</p>
    @endforelse
    <div class="container">
        @auth
            @include('commentAdd', ['post' => $post])
        @else
            Нужно загеристрироваться, чтобы писать комментарии.
        @endauth
        <hr>
        @include('content.comments', ['comments' => $post->comments])
    </div>

@can('update', $post)
    @role('admin')
        <a href="{{ route('adminpanel') }}">Admin Panel</a>
    @else
        <a href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать/удалить статью</a>
    @endrole
@endcan