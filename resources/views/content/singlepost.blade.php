<div class="blog-post">
<h2 class="blog-post-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->content}}
</div><!-- /.blog-post -->
@can('update', $post)
    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать/удалить статью</a>;
    @role('admin')
        Admin Panel
    @endrole
@endcan