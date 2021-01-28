<div class="blog-post">
<h2 class="blog-post-title"><a href="{{ route("posts.show", ['post' => $post->slug]) }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->updated_at }}</p>
    @include('content.tags', ['tags' => $post->tags])
    {{ $post->brief}}
</div>
