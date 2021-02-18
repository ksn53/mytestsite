<div class="blog-post">
<h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->content}}
</div>

    <div class="container">
        <div class="row"><a href="#" id="addacomment" class="btn btn-primary">Добавить комментарий</a> </div>
        @include('commentAdd', ['post' => $post])
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