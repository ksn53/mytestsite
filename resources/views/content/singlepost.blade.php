<div class="blog-post">
<h2 class="blog-post-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    {{ $post->content}}
</div><!-- /.blog-post -->
<a href="{{ route('posts.edit', ['post' => $post->slug]) }}">Редактировать/удалить статью</a>;