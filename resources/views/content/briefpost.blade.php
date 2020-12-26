<div class="blog-post">
<h2 class="blog-post-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->brief}}
</div><!-- /.blog-post -->
