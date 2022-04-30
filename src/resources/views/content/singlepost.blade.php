<div class="blog-post">
<h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->content}}
</div>
    @forelse($post->history as $item)
    <hr>
        <p>{{ $item->email }} {{ $item->pivot->created_at->diffForHumans() }}<br>
            Было:<br>
            @foreach($item->pivot->before as $key => $value)
                Поле: {{ $key }} - {{ $value }}<br>
            @endforeach
            Стало:<br>
            @foreach($item->pivot->after as $key => $value)
                Поле: {{ $key }} - {{ $value }}<br>
            @endforeach
        </p>
    @empty
        <p>Нет истории измеений.</p>
    @endforelse
    <div class="container">
        @auth
            @include('commentAdd', ['item' => $post, 'route' => 'commentpost'])
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